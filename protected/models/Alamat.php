<?php

/**
 * This is the model class for table "alamat".
 *
 * The followings are the available columns in table 'alamat':
 * @property integer $id_klinik
 * @property string $alamat_1
 * @property string $alamat_2
 * @property string $kecamatan
 * @property string $kota
 * @property string $provinsi
 */
class Alamat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alamat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_klinik, alamat_1, kecamatan, kota, provinsi', 'required'),
			array('id_klinik', 'numerical', 'integerOnly'=>true),
			array('alamat_1, alamat_2, kecamatan, kota, provinsi', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_klinik, alamat_1, alamat_2, kecamatan, kota, provinsi', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_klinik' => 'Id Klinik',
			'alamat_1' => 'Alamat 1',
			'alamat_2' => 'Alamat 2',
			'kecamatan' => 'Kecamatan',
			'kota' => 'Kota',
			'provinsi' => 'Provinsi',
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

		$criteria->compare('id_klinik',$this->id_klinik);
		$criteria->compare('alamat_1',$this->alamat_1,true);
		$criteria->compare('alamat_2',$this->alamat_2,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('provinsi',$this->provinsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alamat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
