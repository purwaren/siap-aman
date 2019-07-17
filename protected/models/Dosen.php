<?php

/**
 * This is the model class for table "dosen".
 *
 * The followings are the available columns in table 'dosen':
 * @property integer $id
 * @property string $nidn
 * @property string $nip
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal
 * @property string $jenis_kelamin
 * @property string $kewarganegaraan
 * @property string $agama
 * @property string $nik
 * @property string $alamat
 * @property string $kabupaten
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $status_pegawai
 * @property string $status_ikatan_kerja
 * @property string $no_sk_pengangkatan
 * @property string $tgl_sk_pengangkatan
 * @property string $tgl_masuk
 */
class Dosen extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, tempat_lahir, tanggal, jenis_kelamin, status_pegawai, status_ikatan_kerja', 'required'),
			array('nidn, nip, tempat_lahir, agama, nik, kabupaten', 'length', 'max'=>32),
			array('nama', 'length', 'max'=>128),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('kewarganegaraan, alamat, nama_ayah, nama_ibu, no_sk_pengangkatan', 'length', 'max'=>64),
			array('status_pegawai, status_ikatan_kerja', 'length', 'max'=>16),
			array('tgl_sk_pengangkatan, tgl_masuk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nidn, nip, nama, tempat_lahir, tanggal, jenis_kelamin, kewarganegaraan, agama, nik, alamat, kabupaten, nama_ayah, nama_ibu, status_pegawai, status_ikatan_kerja, no_sk_pengangkatan, tgl_sk_pengangkatan, tgl_masuk', 'safe', 'on'=>'search'),
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
			'nidn' => 'NIDN',
			'nip' => 'NIP',
			'nama' => 'Nama',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal' => 'Tanggal',
			'jenis_kelamin' => 'Jenis Kelamin',
			'kewarganegaraan' => 'Kewarganegaraan',
			'agama' => 'Agama',
			'nik' => 'NIK',
			'alamat' => 'Alamat',
			'kabupaten' => 'Kabupaten',
			'nama_ayah' => 'Nama Ayah',
			'nama_ibu' => 'Nama Ibu',
			'status_pegawai' => 'Status Pegawai',
			'status_ikatan_kerja' => 'Status Ikatan Kerja',
			'no_sk_pengangkatan' => 'No SK Pengangkatan',
			'tgl_sk_pengangkatan' => 'Tanggal SK Pengangkatan',
			'tgl_masuk' => 'Tanggal Masuk',
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
		$criteria->compare('nidn',$this->nidn,true);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('status_pegawai',$this->status_pegawai,true);
		$criteria->compare('status_ikatan_kerja',$this->status_ikatan_kerja,true);
		$criteria->compare('no_sk_pengangkatan',$this->no_sk_pengangkatan,true);
		$criteria->compare('tgl_sk_pengangkatan',$this->tgl_sk_pengangkatan,true);
		$criteria->compare('tgl_masuk',$this->tgl_masuk,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dosen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
