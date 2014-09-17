<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $Country_ID
 * @property string $Name
 * @property string $ISO_short
 * @property string $ISO_long
 * @property string $Code
 */
class Country extends CActiveRecord
{
        const TYPE_BELGIUM=1;
        const TYPE_FRANCE=2;
        const TYPE_UNITEDKINGDOM=3;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name', 'required'),
			array('Name', 'length', 'max'=>128),
			array('ISO_short', 'length', 'max'=>2),
			array('ISO_long', 'length', 'max'=>3),
			array('Code', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Country_ID, Name, ISO_short, ISO_long, Code', 'safe', 'on'=>'search'),
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
                    /* relation with client, a country has many clients */
                    'Clients' => array(self::HAS_MANY, 'Client', 'Country_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Country_ID' => Yii::t('dictionary','Country'),
			'Name' => Yii::t('dictionary','Name'),
			'ISO_short' => Yii::t('dictionary','Short ISO'),
			'ISO_long' => Yii::t('dictionary','Long ISO'),
			'Code' => Yii::t('dictionary','Code'),
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

		$criteria->compare('Country_ID',$this->Country_ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ISO_short',$this->ISO_short,true);
		$criteria->compare('ISO_long',$this->ISO_long,true);
		$criteria->compare('Code',$this->Code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
