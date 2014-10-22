<?php

class ProjectController extends Controller
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
			array('allow',  // allow member users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
                                'expression' => array('ProjectController','allowAdminRights')
			),
                        array('allow', //allow authenticated superadmin to perform 'index', 'view', 'create', 'admin', 'update', 'delete' actions
				'actions'=>array('index','view','create','admin','update','delete'),
				'users'=>array('@'),
                                'expression' => array('ProjectController','allowOnlySuperAdmin')
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
                if(yii::app()->user->getProjectAcces($id) || $this->allowOnlySuperAdmin())
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
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Project_ID));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Project_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                 /*
                 * get project data
                 * set condition to filter projects 
                 *(keep the privileges form superadmin in mind.) 
                 */ 
                if($this->allowOnlySuperAdmin())
                {
                    $dataProvider=new CActiveDataProvider('Project');
                }else{
                    $dataProvider = new CActiveDataProvider('Project', array('data'=>yii::app()->user->getProjects())); 
                }
                
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Project the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Project $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /**
        * @return listdata Clients
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
        
         /*
        * Check if the selected user is privileged by the acceslevels of a logged user
        * @return boolean whether the selected user is in the admin group
        */
        public function isSelectedUserPrivileged(){
            
            
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
}
