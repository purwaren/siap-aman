<?php

/**
 * This is the model class for table "riwayat_pekerjaan".
 *
 * The followings are the available columns in table 'riwayat_pekerjaan':
 * @property integer $id_pendamping
 * @property string $nama_institusi
 * @property string $jabatan
 * @property string $mulai
 * @property string $berakhir
 */
class RiwayatPekerjaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'riwayat_pekerjaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pendamping, nama_institusi, jabatan, mulai', 'required'),
			array('id_pendamping', 'numerical', 'integerOnly'=>true),
			array('nama_institusi, jabatan', 'length', 'max'=>128),
			array('mulai, berakhir', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pendamping, nama_institusi, jabatan, mulai, berakhir', 'safe', 'on'=>'search'),
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
			'id_pendamping' => 'Id Pendamping',
			'nama_institusi' => 'Nama Institusi',
			'jabatan' => 'Jabatan',
			'mulai' => 'Mulai',
			'berakhir' => 'Berakhir',
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

		$criteria->compare('id_pendamping',$this->id_pendamping);
		$criteria->compare('nama_institusi',$this->nama_institusi,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('mulai',$this->mulai,true);
		$criteria->compare('berakhir',$this->berakhir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatPekerjaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
