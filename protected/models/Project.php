<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $Project_ID
 * @property integer $Client_ID
 * @property integer $CreatedBy_User_ID
 * @property integer $UpdatedBy_User_ID
 * @property string $Name
 * @property string $Description
 * @property integer $Active
 * @property string $Website
 * @property string $Date_Added
 * @property string $Date_Modified
 * @property string $Date_Expired
 */
class Project extends CActiveRecord
{
    
         /* constants for project activation */
        const ACTIVATION_NOT_ACTIVE = 0;
        const ACTIVATION_ACTIVE     = 1;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Client_ID, Name, Active', 'required'),
			array('Client_ID, CreatedBy_User_ID, UpdatedBy_User_ID, Active', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>128),
			array('Description, Website', 'length', 'max'=>256),
			array('Date_Added, Date_Modified, Date_Expired', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Project_ID, Client_ID, CreatedBy_User_ID, UpdatedBy_User_ID, Name, Description, Active, Website, Date_Added, Date_Modified, Date_Expired', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    // relation with user table a user has 1 client.
                    'Client' => array(self::BELONGS_TO, 'Client', 'Client_ID'), //=> de client van een project
                    'CreatedBy' => array(self::BELONGS_TO, 'User', 'CreatedBy_User_ID'),//=> de user die het project heeft gecreëerd
                    'UpdatedBy' => array(self::BELONGS_TO, 'User', 'CreatedBy_User_ID'),//=> de user die het project heeft geupdate
                    'Users' => array(self::MANY_MANY, 'User', 'project_user_assignment(Project_ID, User_ID)'),//=> die users die een project bevat (van de websitemanager)
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Project_ID' => 'Project',
			'Client_ID' => 'Client',
			'CreatedBy_User_ID' => 'Created By User',
			'UpdatedBy_User_ID' => 'Updated By User',
			'Name' => 'Name',
			'Description' => 'Description',
			'Active' => 'Active',
			'Website' => 'Website',
			'Date_Added' => 'Date Added',
			'Date_Modified' => 'Date Modified',
			'Date_Expired' => 'Date Expired',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Project_ID',$this->Project_ID);
		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('CreatedBy_User_ID',$this->CreatedBy_User_ID);
		$criteria->compare('UpdatedBy_User_ID',$this->UpdatedBy_User_ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('Date_Added',$this->Date_Added,true);
		$criteria->compare('Date_Modified',$this->Date_Modified,true);
		$criteria->compare('Date_Expired',$this->Date_Expired,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
        * Encrypt password on create and on update: overload beforeSave function
        */
       protected function beforeSave()
       {    
            if(parent::beforeSave())
            {
                //create
                if ($this->isNewRecord) 
                {   
                    $timestamp = strtotime('+2 years');
                    $this->Date_Expired      = date("Y-m-d H:i:s", $timestamp);
                    $this->Date_Added        = date("Y-m-d H:i:s", time());
                    $this->CreatedBy_User_ID = yii::app()->user->getUserID();
                }
                else //update
                {
                    $this->Date_Modified     = date("Y-m-d H:i:s", time());
                    $this->UpdatedBy_User_ID = yii::app()->user->getUserID();
                }
                return true;
           }
           return false;
       }
        
        
        /*
         * activation
         */
        public function getActivationOptions()
        {
            return array(
                self::ACTIVATION_NOT_ACTIVE       => Yii::t('dictionary','Not active'),
                self::ACTIVATION_ACTIVE           => Yii::t('dictionary','Active'),
            );
        }
       
        public function getActivationOption($activation){
            $array = $this->getActivationOptions();        
            return $array[$activation];
        }
}
