<?php

/**
 * This is the model class for table "registrant".
 *
 * The followings are the available columns in table 'registrant':
 * @property integer $id
 * @property String reg_number
 * @property string $firstname
 * @property string $lastname
 * @property string $nickname
 * @property string $gender
 * @property string $birth_place
 * @property string $birth_date
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $nationality
 * @property string $fathers_name
 * @property string $mothers_name
 * @property string $school_origin
 * @property integer $graduated_year
 * @property string $ijazah_number
 * @property string $selected_edu_level
 * @property integer $flag_dokumen
 * @property integer $status
 * @property string secret_key
 * @property string verifyCode
 */
class Registrant extends CActiveRecord
{
	const STATUS_REGISTERED = 0;
	const STATUS_VALIDATED = 1;
	const STATUS_APPROVED = 2;
	const FLAG_DOCUMENT_PENDING = 0;
	const FLAG_DOCUMENT_UPLOADED = 1;
	const FLAG_DOCUMENT_VERIFIED = 2;

	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registrant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reg_number, firstname, lastname, nickname, gender, birth_place, birth_date, address, phone, email,
			nationality, fathers_name, mothers_name, school_origin, graduated_year, ijazah_number, selected_edu_level,
			flag_dokumen, status, secret_key', 'required'),
			array('graduated_year, flag_dokumen, status', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname, nickname, birth_place, nationality, selected_edu_level', 'length', 'max'=>64),
			array('gender, phone', 'length', 'max'=>16),
			array('address, fathers_name, mothers_name, school_origin', 'length', 'max'=>256),
			array('email', 'length', 'max'=>128),
			array('ijazah_number', 'length', 'max'=>32),
			array('email','email','checkMX'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, firstname, lastname, nickname, gender, birth_place, birth_date, address, phone, email, nationality,
			fathers_name, mothers_name, school_origin, graduated_year, ijazah_number, selected_edu_level, flag_dokumen,
			status', 'safe', 'on'=>'search'),
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
			'reg_number'=>'Nomor Registrasi',
			'firstname' => 'Nama Depan',
			'lastname' => 'Nama Belakang',
			'nickname' => 'Nama Panggilan',
			'gender' => 'Jenis Kelamin',
			'birth_place' => 'Tempat Lahir',
			'birth_date' => 'Tanggal Lahir',
			'address' => 'Alamat Lengkap',
			'phone' => 'Nomor Telepon',
			'email' => 'Alamat Email',
			'nationality' => 'Kewarganegaraan',
			'fathers_name' => 'Nama Ayah',
			'mothers_name' => 'Nama Ibu',
			'school_origin' => 'Asal Sekolah',
			'graduated_year' => 'Tahun Lulus',
			'ijazah_number' => 'Nomor Ijazah',
			'selected_edu_level' => 'Jenjang Pendidikan',
			'flag_dokumen' => 'Flag Dokumen',
			'status' => 'Status',
			'verifyCode' => 'Kode Verifikasi',
			'timestamp_created'=>'Waktu Daftar'
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
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('fathers_name',$this->fathers_name,true);
		$criteria->compare('mothers_name',$this->mothers_name,true);
		$criteria->compare('school_origin',$this->school_origin,true);
		$criteria->compare('graduated_year',$this->graduated_year);
		$criteria->compare('ijazah_number',$this->ijazah_number,true);
		$criteria->compare('selected_edu_level',$this->selected_edu_level,true);
		$criteria->compare('flag_dokumen',$this->flag_dokumen);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registrant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string registration number
	 */
	public function generateRegistrationNumber()
	{
		return date('YmdHis').rand(10,99);
	}
	
	public function getGender()
	{
		$options = array('male'=>'Laki-laki','female'=>'Perempuan');
		return $options[$this->gender];
	}

	public function getStatusPendaftaran()
	{
		if($this->status == self::STATUS_REGISTERED && $this->flag_dokumen == self::FLAG_DOCUMENT_PENDING)
		{
			return '<label class="label label-warning">Menunggu Dokumen</label>';
		}
		else if($this->status == self::STATUS_REGISTERED && $this->flag_dokumen == self::FLAG_DOCUMENT_UPLOADED)
		{
			return '<label class="label label-warning">Butuh Verifikasi</label>';
		}
		else if($this->status == self::STATUS_REGISTERED && $this->flag_dokumen == self::FLAG_DOCUMENT_VERIFIED)
		{
			return '<label class="label label-danger">Menunggu Pembayaran</label>';
		}
		else if($this->status == self::STATUS_VALIDATED && $this->flag_dokumen == self::FLAG_DOCUMENT_VERIFIED)
		{
			return '<label class="label label-warning">Verifikasi Pembayaran</label>';
		}
		else if($this->status == self::STATUS_APPROVED)
		{
			return '<label class="label label-success">Siap Tes</label>';
		}
		
	}
}
