<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $User_ID
 * @property integer $Client_ID
 * @property string $UserName
 * @property string $Password
 * @property string $Email
 * @property string $IP_Adress
 * @property string $Salt
 * @property string $Activation_Token
 * @property string $Forgot_Password_Token
 * @property integer $Active
 * @property integer $Suspend
 * @property integer $Failed_Logins
 * @property string $Failed_Login_IP
 * @property string $Failed_Login_Ban_Date
 * @property string $Last_Login_Date
 * @property string $Current_Login_Date
 * @property string $Date_Added
 * @property string $Date_Modified
 * @property integer $Level
 */
class User extends ManyManyActiveRecord
{
        public $Password_Repeat;
        
        /* constants for banned users */
        const SUSPEND_NONE                 =   0;
        const SUSPEND_PERMANENT_BANNED     =   1;
        const SUSPEND_TEMPORARILY_BANNED   =   2;

        /* constants for user roles */
        const LEVEL_SUPERADMIN   =   0;
        const LEVEL_ADMIN        =   1;
        const LEVEL_MEMBER       =   2;
        
        /* constants for user activation */
        const ACTIVATION_NOT_ACTIVE = 0;
        const ACTIVATION_ACTIVE     = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Client_ID, UserName, Password, Email, Password_Repeat, Active', 'required', 'on' => 'register'),
                        array('UserName', 'unique'),
			array('Client_ID, Active, Suspend, Failed_Logins, Level', 'numerical', 'integerOnly'=>true),
                        array('Password', 'length', 'min' => 8, 'max'=>32, 'on' => 'register'),
                        array('Password', 'compare', 'compareAttribute' => 'Password_Repeat', 'on' => 'register'),
			array('UserName', 'length', 'max'=>32),
			array('Email,Password, IP_Adress, Salt, Activation_Token, Forgot_Password_Token, Failed_Login_IP', 'length', 'max'=>256),
			array('Password, Password_Repeat, Failed_Login_Ban_Date, Last_Login_Date, Current_Login_Date, Date_Added, Data_Modified', 'safe'),
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('User, Client_ID, UserName, Password, Email, IP_Adress, Salt, Activation_Token, Forgot_Password_Token, Active, Suspend, Failed_Logins, Failed_Login_IP, Failed_Login_Ban_Date, Last_Login_Date, Current_Login_Date, Date_Added, Date_Modified, Level', 'safe', 'on'=>'search'),
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
                    // relation with client table a user has 1 client.
                    'Client' => array(self::BELONGS_TO, 'Client', 'Client_ID'), //=> de client van een user
                    'CreatedProjects'=> array(self::HAS_MANY, 'Project', 'CreatedBy_User_ID'), //=> de gecreëerde projecten die een user heeft aangemaakt
                    'Projects' => array(self::MANY_MANY, 'Project', 'project_user_assignment(User_ID, Project_ID)'), //=> de projecten waar een user toegang tot heeft
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'User_ID'               => Yii::t('dictionary','User'),
			'Client_ID'             => Yii::t('dictionary','Client'),
			'UserName'              => Yii::t('dictionary','User name'),
			'Password'              => Yii::t('dictionary','Password'),
                        'Password_Repeat'       => Yii::t('dictionary','Confirm password'),
			'Email'                 => Yii::t('dictionary','Email adress'),
			'IP_Adress'             => Yii::t('dictionary','IP-adress'),
			'Salt'                  => Yii::t('dictionary','Salt'),
			'Activation_Token'      => Yii::t('dictionary','Activation token'),
			'Forgot_Password_Token' => Yii::t('dictionary','Forgot password token'),
			'Active'                => Yii::t('dictionary','Active'),
			'Suspend'               => Yii::t('dictionary','Suspend'),
			'Failed_Logins'         => Yii::t('dictionary','Failed logins'),
			'Failed_Login_IP'       => Yii::t('dictionary','Failed login IP'),
			'Failed_Login_Ban_Date' => Yii::t('dictionary','Failed login ban date'),
			'Last_Login_Date'       => Yii::t('dictionary','Last login date'),
                        'Current_Login_Date'    => Yii::t('dictionary',"Current login date"),
			'Date_Added'            => Yii::t('dictionary','Date added'),
                        'Date_Modified'         => Yii::t('dictionary','Date modified'),
			'Level'                 => Yii::t('dictionary','Level'),
		);
	}
        
        public function behaviors()
        {
                return array( 'EAdvancedArBehavior' => array(
                      'class' => 'application.extensions.EAdvancedArBehavior'));
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

		$criteria->compare('User_ID',$this->User_ID);
		$criteria->compare('Client',$this->Client);
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('IP_Adress',$this->IP_Adress,true);
		$criteria->compare('Salt',$this->Salt,true);
		$criteria->compare('Activation_Token',$this->Activation_Token,true);
		$criteria->compare('Forgot_Password_Token',$this->Forgot_Password_Token,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Suspend',$this->Suspend);
		$criteria->compare('Failed_Logins',$this->Failed_Logins);
		$criteria->compare('Failed_Login_IP',$this->Failed_Login_IP,true);
		$criteria->compare('Failed_Login_Ban_Date',$this->Failed_Login_Ban_Date,true);
		$criteria->compare('Last_Login_Date',$this->Last_Login_Date,true);
		$criteria->compare('Date_Added',$this->Date_Added,true);
		$criteria->compare('Level',$this->Level);
                
                if(yii::app()->user->isSuperAdmin()){
                    $criteria->addCondition('Level in (' . yii::app()->user->getAccessLevels('string') . ')');
                }else{
                    $criteria->addCondition('Level in (' . yii::app()->user->getAccessLevels('string') . ') AND Client_ID = ' . yii::app()->user->getClientID());
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
       /**
        * 
        * @return crypted value
        */
       public function hash($value)
       {
           return crypt($value);
       }

       /**
        * Encrypt password on create and on update: overload beforeSave function
        */
       protected function beforeSave()
       {    
            if ($this->isNewRecord) {
                
                $this->Date_Added = date("Y-m-d H:i:s", time());
                $this->IP_Adress  = $this->getIP();
            }
            else {
                $this->Date_Modified = date("Y-m-d H:i:s", time());
                $this->IP_Adress     = $this->getIP();
            }

           
           if (parent::beforeSave())
           {
               $this->Password = $this->hash($this->Password);
               return true;
           }
           return false;
       }
       
       /**
        * Check if a password value correspond to the stored hashed value
        */       
       public function check($value)
       {
           $new_hash = crypt($value, $this->Password);
           if ($new_hash == $this->Password) {
               return true;
           }
           return false;
       }
       
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
       
       public function getSuspendOptions()
       {    
            return array(
                self::SUSPEND_NONE                  => Yii::t('dictionary','Not banned'),
                self::SUSPEND_TEMPORARILY_BANNED    => Yii::t('dictionary','Temporarily banned'),
                self::SUSPEND_PERMANENT_BANNED      => Yii::t('dictionary','Permanent banned'),
            );
       }
       
       public function getSuspendOption($suspend)
       {
        
           $array = $this->getSuspendOptions();
           return $array[$suspend];
       }
       
       public function getLevelOptions($level = null)
       {
           switch ((int)$level){
                case User::LEVEL_SUPERADMIN:
                     $options = array(
                         self::LEVEL_SUPERADMIN  => Yii::t('dictionary','Super Administrator'),
                         self::LEVEL_ADMIN       => Yii::t('dictionary','Administrator'),
                         self::LEVEL_MEMBER      => Yii::t('dictionary','Member'),
                     );
                     break;
                case User::LEVEL_ADMIN:
                    $options = array(
                         self::LEVEL_ADMIN       => Yii::t('dictionary','Administrator'),
                         self::LEVEL_MEMBER      => Yii::t('dictionary','Member'),
                     );
                     break;
                default:
                    $options = array(
                         self::LEVEL_MEMBER      => Yii::t('dictionary','Member'),
                     );
                     break;
           }
            
           return $options;
       }
       
       public function getLevelOption($level)
       {
            $array = $this->getLevelOptions($level);
            return $array[$level];
       }

       private function getIP()
       {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
       }
       
       public function getProjectOptions()
       {
            if(yii::app()->user->isSuperAdmin())
                $data = Project::model()->findAll();
            else
            {
                $condition = "Client_ID = :clientid";
                $params    = array( ':clientid' => yii::app()->user->getClientID());
                $data = Project::model()->findAll( $condition, $params );  
            }
            
            return CHtml::listData($data, "Project_ID", "Name");
       }
       
       
}
