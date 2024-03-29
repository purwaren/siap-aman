<?php

/**
 * This is the model class for table "kontak".
 *
 * The followings are the available columns in table 'kontak':
 * @property integer $id
 * @property integer $id_klinik
 * @property string $no_telp
 * @property string $no_fax
 * @property string $email
 * @property string $website
 *
 * The followings are the available model relations:
 * @property Klinik $idKlinik
 */
class Kontak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kontak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_klinik', 'required'),
			array('id_klinik', 'numerical', 'integerOnly'=>true),
			array('no_telp, no_fax', 'length', 'max'=>32),
			array('email, website', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_klinik, no_telp, no_fax, email, website', 'safe', 'on'=>'search'),
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
			'idKlinik' => array(self::BELONGS_TO, 'Klinik', 'id_klinik'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_klinik' => 'Id Klinik',
			'no_telp' => 'No Telp',
			'no_fax' => 'No Fax',
			'email' => 'Email',
			'website' => 'Website',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_klinik',$this->id_klinik);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('no_fax',$this->no_fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kontak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
