<?php

/**
 * This is the model class for table "riwayat_kepangkatan_dosen".
 *
 * The followings are the available columns in table 'riwayat_kepangkatan_dosen':
 * @property integer $id
 * @property integer $id_dosen
 * @property string $no_sk_kepangkatan
 * @property string $golongan
 * @property string $no_akta_sertifikat_mengajar
 * @property string $lembaga_pengangkat
 * @property string $perguruan_tinggi
 * @property integer $status_ikatan_kerja
 */
class RiwayatKepangkatanDosen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'riwayat_kepangkatan_dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dosen, no_sk_kepangkatan, golongan', 'required'),
			array('id_dosen, status_ikatan_kerja', 'numerical', 'integerOnly'=>true),
			array('no_sk_kepangkatan, no_akta_sertifikat_mengajar, lembaga_pengangkat, perguruan_tinggi', 'length', 'max'=>64),
			array('golongan', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dosen, no_sk_kepangkatan, golongan, no_akta_sertifikat_mengajar, lembaga_pengangkat, perguruan_tinggi, status_ikatan_kerja', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_dosen' => 'Id Dosen',
			'no_sk_kepangkatan' => 'No Sk Kepangkatan',
			'golongan' => 'Golongan',
			'no_akta_sertifikat_mengajar' => 'No Akta Sertifikat Mengajar',
			'lembaga_pengangkat' => 'Lembaga Pengangkat',
			'perguruan_tinggi' => 'Perguruan Tinggi',
			'status_ikatan_kerja' => 'Status Ikatan Kerja',
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
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('no_sk_kepangkatan',$this->no_sk_kepangkatan,true);
		$criteria->compare('golongan',$this->golongan,true);
		$criteria->compare('no_akta_sertifikat_mengajar',$this->no_akta_sertifikat_mengajar,true);
		$criteria->compare('lembaga_pengangkat',$this->lembaga_pengangkat,true);
		$criteria->compare('perguruan_tinggi',$this->perguruan_tinggi,true);
		$criteria->compare('status_ikatan_kerja',$this->status_ikatan_kerja);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatKepangkatanDosen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
