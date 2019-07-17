<?php

/**
 * This is the model class for table "sertifikasi".
 *
 * The followings are the available columns in table 'sertifikasi':
 * @property integer $id_pendamping
 * @property string $no_sertifikat
 * @property string $nama
 * @property string $bidang_peminatan
 * @property string $penyelenggara
 * @property string $tgl_perolehan
 */
class Sertifikasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sertifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pendamping, no_sertifikat, nama, bidang_peminatan, penyelenggara, tgl_perolehan', 'required'),
			array('id_pendamping', 'numerical', 'integerOnly'=>true),
			array('no_sertifikat', 'length', 'max'=>32),
			array('nama, penyelenggara', 'length', 'max'=>128),
			array('bidang_peminatan', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pendamping, no_sertifikat, nama, bidang_peminatan, penyelenggara, tgl_perolehan', 'safe', 'on'=>'search'),
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
			'no_sertifikat' => 'No Sertifikat',
			'nama' => 'Nama',
			'bidang_peminatan' => 'Bidang Peminatan',
			'penyelenggara' => 'Penyelenggara',
			'tgl_perolehan' => 'Tgl Perolehan',
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
		$criteria->compare('no_sertifikat',$this->no_sertifikat,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('bidang_peminatan',$this->bidang_peminatan,true);
		$criteria->compare('penyelenggara',$this->penyelenggara,true);
		$criteria->compare('tgl_perolehan',$this->tgl_perolehan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sertifikasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
