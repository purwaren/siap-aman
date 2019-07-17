<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $status
 * @property integer $flag_delete
 * @property integer $login_atemp
 * @property string $last_login_attempt
 * @property string $last_login_time
 * @property string $timestamp_created
 * @property string $timestamp_updated
 * @property string $user_create
 * @property string $user_update
 */
class Users extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_BLOCKED = 2;
	const STATUS_INACTIVE = 0;
	const FLAG_DELETE_ACTIVE = 1;
	const FLAG_DELETE_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, email, password, salt, status, timestamp_created, user_create', 'required'),
			array('status, flag_delete, login_atemp', 'numerical', 'integerOnly'=>true),
			array('name, email, password', 'length', 'max'=>128),
			array('username, salt, user_create, user_update', 'length', 'max'=>32),
			array('last_login_attempt, last_login_time, timestamp_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, username, email, password, salt, status, flag_delete, login_atemp, last_login_attempt, last_login_time, timestamp_created, timestamp_updated, user_create, user_update', 'safe', 'on'=>'search'),
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
			'name' => 'Nama Lengkap',
			'username' => 'Username',
			'email' => 'Alamat Email',
			'password' => 'Password',
			'salt' => 'Salt',
			'status' => 'Status',
			'flag_delete' => 'Flag Delete',
			'login_atemp' => 'Login Atemp',
			'last_login_attempt' => 'Last Login Attempt',
			'last_login_time' => 'Last Login Time',
			'timestamp_created' => 'Timestamp Created',
			'timestamp_updated' => 'Timestamp Updated',
			'user_create' => 'User Create',
			'user_update' => 'User Update',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('flag_delete',$this->flag_delete);
		$criteria->compare('login_atemp',$this->login_atemp);
		$criteria->compare('last_login_attempt',$this->last_login_attempt,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('timestamp_created',$this->timestamp_created,true);
		$criteria->compare('timestamp_updated',$this->timestamp_updated,true);
		$criteria->compare('user_create',$this->user_create,true);
		$criteria->compare('user_update',$this->user_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findByUsername($username)
	{
		return self::model()->findByAttributes(array('username'=>$username));
	}
}
