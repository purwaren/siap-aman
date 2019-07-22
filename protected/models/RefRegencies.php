<?php

/**
 * This is the model class for table "ref_regencies".
 *
 * The followings are the available columns in table 'ref_regencies':
 * @property string $id
 * @property string $province_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property RefDistricts[] $refDistricts
 * @property RefProvinces $province
 * @property Sudin[] $sudins
 */
class RefRegencies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_regencies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, province_id, name', 'required'),
			array('id', 'length', 'max'=>4),
			array('province_id', 'length', 'max'=>2),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, province_id, name', 'safe', 'on'=>'search'),
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
			'refDistricts' => array(self::HAS_MANY, 'RefDistricts', 'regency_id'),
			'province' => array(self::BELONGS_TO, 'RefProvinces', 'province_id'),
			'sudins' => array(self::HAS_MANY, 'Sudin', 'id_regency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'province_id' => 'Province',
			'name' => 'Name',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RefRegencies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
