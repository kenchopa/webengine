<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $Client_ID
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $Telephone
 * @property string $Company
 * @property integer $Country_ID
 * @property string $Region
 * @property string $City
 * @property string $Street
 * @property string $StreetNumber
 * @property string $Fax
 * @property string $Mobile
 * @property integer $VAT
 */
class Client extends CActiveRecord
{        
        private $fullname;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstName, LastName, Email, Telephone, Company', 'required'),
			array('VAT, Country_ID', 'numerical', 'integerOnly'=>true),
			array('FirstName, LastName', 'length', 'max'=>64),
			array('Email, Region, City', 'length', 'max'=>128),
			array('Telephone, Fax, Mobile', 'length', 'max'=>32),
			array('Company, Street', 'length', 'max'=>256),
			array('StreetNumber', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Client_ID, FirstName, LastName, Email, Telephone, Company, Country_ID, Region, City, Street, StreetNumber, Fax, Mobile, VAT', 'safe', 'on'=>'search'),
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
                    /* relation with user table, a country has many clients */
                    'Users' => array(self::HAS_MANY, 'User', 'Client_ID'),
                    'projects' => array(self::HAS_MANY, 'User', 'Client_ID'),
                     // relation with country table, a client has 1 country.
                    'Country' => array(self::BELONGS_TO, 'Country', 'Country_ID'),
		);
	}
        
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Client_ID'        => Yii::t('dictionary','Client'),
			'FirstName'     => Yii::t('dictionary','First name'),
			'LastName'      => Yii::t('dictionary','Last name'),
			'Email'         => Yii::t('dictionary','Email address'),
			'Telephone'     => Yii::t('dictionary','Telephone'),
			'Company'       => Yii::t('dictionary','Company'),
			'Country_ID'    => Yii::t('dictionary','Country'),
			'Region'        => Yii::t('dictionary','Region'),
			'City'          => Yii::t('dictionary','City'),
			'Street'        => Yii::t('dictionary','Street'),
			'StreetNumber'  => Yii::t('dictionary','Street number'),
			'Fax'           => Yii::t('dictionary','Fax'),
			'Mobile'        => Yii::t('dictionary','Mobile'),
			'VAT'           => Yii::t('dictionary','VAT'),
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

		$criteria->compare('Client_ID',$this->Client_ID);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('Country_ID',$this->Country_ID,true);
		$criteria->compare('Region',$this->Region,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Street',$this->Street,true);
		$criteria->compare('StreetNumber',$this->StreetNumber,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('VAT',$this->VAT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Client the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function getFullName()
        {
            return $this->FirstName.' '.$this->LastName;
        }
      
}
