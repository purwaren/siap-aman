<?php

/**
 * This is the model class for table "klinik".
 *
 * The followings are the available columns in table 'klinik':
 * @property integer $id
 * @property integer $id_user
 * @property string $kode_klinik
 * @property string $nama
 * @property string $no_izin
 * @property string $kepemilikan
 * @property string $penanggung_jawab
 * @property string $karakteristik
 * @property string $tingkatan
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Alamat[] $alamats
 * @property FasilitasKlinik[] $fasilitasKliniks
 * @property FotoKlinik[] $fotoKliniks
 * @property Users $idUser
 * @property Kontak[] $kontaks
 * @property PengajuanAkreditasi[] $pengajuanAkreditasis
 */
class Klinik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'klinik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, penanggung_jawab, created_by, created_at', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('kode_klinik, no_izin', 'length', 'max'=>64),
			array('nama, penanggung_jawab', 'length', 'max'=>128),
			array('kepemilikan, karakteristik, tingkatan, created_by, updated_by', 'length', 'max'=>32),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, kode_klinik, nama, no_izin, kepemilikan, penanggung_jawab, karakteristik, tingkatan, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'alamats' => array(self::HAS_MANY, 'Alamat', 'id_klinik'),
			'fasilitasKliniks' => array(self::HAS_MANY, 'FasilitasKlinik', 'id_klinik'),
			'fotoKliniks' => array(self::HAS_MANY, 'FotoKlinik', 'id_klinik'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'kontaks' => array(self::HAS_MANY, 'Kontak', 'id_klinik'),
			'pengajuanAkreditasis' => array(self::HAS_MANY, 'PengajuanAkreditasi', 'id_klinik'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'kode_klinik' => 'Kode Klinik',
			'nama' => 'Nama',
			'no_izin' => 'No Izin',
			'kepemilikan' => 'Kepemilikan',
			'penanggung_jawab' => 'Penanggung Jawab',
			'karakteristik' => 'Karakteristik',
			'tingkatan' => 'Tingkatan',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
			'updated_by' => 'Updated By',
			'updated_at' => 'Updated At',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('kode_klinik',$this->kode_klinik,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('no_izin',$this->no_izin,true);
		$criteria->compare('kepemilikan',$this->kepemilikan,true);
		$criteria->compare('penanggung_jawab',$this->penanggung_jawab,true);
		$criteria->compare('karakteristik',$this->karakteristik,true);
		$criteria->compare('tingkatan',$this->tingkatan,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Klinik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
