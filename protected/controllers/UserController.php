<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', //allow authenticated superadmin to perform 'admin' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
                                'expression' => array('UserController','allowAdminRights')
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
                                'expression' => array('UserController','allowOnlyAdmin')
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
      
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                if($this->isSelectedUserPrivileged($id))
                {
                    $this->render('view',array(
                            'model'=>$this->loadModel($id),
                    ));
                }
                else
                {
                    throw new CHttpException(403,'Damn You!, you are not authorized to perform this action.');
                }
	}

        /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
        public function actionCreate()
        {
                $model=new User('register');

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);
               
                if(isset($_POST['User']))
                {
                        $model->attributes=$_POST['User'];
                        $accessLevels = $model->getLevelOptions(Yii::app()->user->getLevel());
                        if(array_key_exists($model->Level, $accessLevels)){
                            //we only want to apply the scenario when a password field has been entered
                            if ($model->Password || $model->Password_Repeat){
                                $model->scenario = 'register';
                                if($model->save()){
                                    
                                        if(isset($_POST['User']['Projects']))
                                            $model->setRelationRecords('Projects',$_POST['User']['Projects']);
                                        
                                        $this->redirect(array('view','id'=>$model->User_ID));
                                }     
                                else
                                        $model->Password = $_POST['User']['Password'];
                            }
                        }
                }

                $this->render('create',array(
                        'model'=>$model,
                ));
        }
        
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{   
                if($this->isSelectedUserPrivileged($id)){
                    $model=$this->loadModel($id);
                   // Uncomment the following line if AJAX validation is needed
                   //$this->performAjaxValidation($model);
                   if(isset($_POST['User']))
                   {       
                           $model->attributes=$_POST['User'];
                           
                           if(isset($_POST['User']['Projects']))
                                $model->setRelationRecords('Projects',$_POST['User']['Projects']);
                           
                           if ($model->Password || $model->Password_Repeat){
                               $model->scenario = 'register';
                               if($model->save())
                                       $this->redirect(array('view','id'=>$model->User_ID));
                           }
                   }

                   $this->render('update',array(
                           'model'=>$model,
                   ));
                }else{
                    throw new CHttpException(403,'Damn You!, you are not authorized to perform this action.');
                }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                if($this->allowDelete($id)){
                    $this->loadModel($id)->delete();

                    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                    if(!isset($_GET['ajax']))
                            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin')); 
                }else{
                    throw new CHttpException(403,'Damn You!, you are not authorized to perform this action.');
                }
                 
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{       
                /*
                 * set condition to filter users 
                 *(keep the privileges form superadmin in mind.) 
                 */ 
                if(yii::app()->user->isSuperAdmin())
                {
                    $where = "level in(" .yii::app()->user->getAccessLevels('string') . ")"; 
                }else{
                    $where = "level in(" .yii::app()->user->getAccessLevels('string') . ") AND Client_ID = " . yii::app()->user->getClientID();
                }
                
		$dataProvider=new CActiveDataProvider('User', array(
                    'criteria'=>array(
                         'condition'=>$where,
                    ),
                   
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
           
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        
        /*
        * Check if the selected user is privileged by the acceslevels of a logged user
        * @return boolean whether the selected user is in the admin group
        */
        public function isSelectedUserPrivileged($userId){
            if($this->allowOnlySuperAdmin())
            {
                 $user = User::model()->findByPk( $userId ); 
            }
            else
            {
                $condition = "Client_ID = :clientid";
                $params    = array( ':clientid' => yii::app()->user->getClientID());
                $user = User::model()->findByPk( $userId, $condition, $params );  
            }
            
            if(isset($user))
            {
                return key_exists($user->Level, yii::app()->user->getAccessLevels()); 
            }
            
            return false;
        }
        
        /**
        * @return array counties names indexed by country
        */
        public function getClientOptions()
        {
                if($this->allowOnlySuperAdmin()){
                    $allClients = Client::model()->findAll();
                }
                else{
                    $condition = "Client_ID = :clientid";
                    $params    = array(":clientid" => yii::app()->user->getClientID());
                    $allClients = Client::model()->findAll( $condition, $params );
                }
                
                return CHtml::listData($allClients, 'Client_ID', 'fullName');
        }
        
        
        private function allowDelete($id){
            $user = User::model()->findByPk( $id );
            
            return ($user->User_ID != yii::app()->user->getUserID() && $user->Level != yii::app()->user->getLevel());
        }
          
}
