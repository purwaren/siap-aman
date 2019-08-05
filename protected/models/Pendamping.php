<?php

/**
 * This is the model class for table "pendamping".
 *
 * The followings are the available columns in table 'pendamping':
 * @property integer $id
 * @property integer $id_sudin
 * @property integer $id_user
 * @property string $tipe
 * @property string $nama
 * @property string $gelar_depan
 * @property string $gelar_belakang
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $jabatan
 * @property integer $alamat
 * @property string $no_hp
 * @property string $email
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Sudin $idSudin
 * @property Users $idUser
 * @property Alamat $alamat0
 */
class Pendamping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pendamping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sudin, id_user, tipe, nama, created_by', 'required'),
			array('id_sudin, id_user, alamat', 'numerical', 'integerOnly'=>true),
			array('tipe, gelar_depan, gelar_belakang, tempat_lahir, jabatan, no_hp, created_by, updated_by', 'length', 'max'=>32),
			array('nama, email', 'length', 'max'=>128),
			array('tgl_lahir, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_sudin, id_user, tipe, nama, gelar_depan, gelar_belakang, tempat_lahir, tgl_lahir, jabatan, alamat, no_hp, email, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'idSudin' => array(self::BELONGS_TO, 'Sudin', 'id_sudin'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'alamat0' => array(self::BELONGS_TO, 'Alamat', 'alamat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_sudin' => 'Id Sudin',
			'id_user' => 'Id User',
			'tipe' => 'Tipe',
			'nama' => 'Nama',
			'gelar_depan' => 'Gelar Depan',
			'gelar_belakang' => 'Gelar Belakang',
			'tempat_lahir' => 'Tempat Lahir',
			'tgl_lahir' => 'Tgl Lahir',
			'jabatan' => 'Jabatan',
			'alamat' => 'Alamat',
			'no_hp' => 'No Hp',
			'email' => 'Email',
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
		$criteria->compare('id_sudin',$this->id_sudin);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('tipe',$this->tipe,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('gelar_depan',$this->gelar_depan,true);
		$criteria->compare('gelar_belakang',$this->gelar_belakang,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('alamat',$this->alamat);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('email',$this->email,true);
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
	 * @return Pendamping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
