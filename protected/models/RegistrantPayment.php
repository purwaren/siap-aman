<?php

/**
 * This is the model class for table "registrant_payment".
 *
 * The followings are the available columns in table 'registrant_payment':
 * @property integer $id
 * @property integer $reg_id
 * @property string $name
 * @property string $bank
 * @property double $amount
 * @property string $date_paid
 * @property string $timestamp_created
 * @property string $user_create
 *
 * The followings are the available model relations:
 * @property Registrant $reg
 */
class RegistrantPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registrant_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reg_id, name, bank, amount, date_paid, timestamp_created, user_create', 'required'),
			array('reg_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name, bank', 'length', 'max'=>256),
			array('user_create', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reg_id, name, bank, amount, date_paid, timestamp_created, user_create', 'safe', 'on'=>'search'),
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
			'reg' => array(self::BELONGS_TO, 'Registrant', 'reg_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reg_id' => 'Nomor Registrasi',
			'name' => 'Rama Rekening',
			'bank' => 'Bank Pengirim',
			'amount' => 'Jumlah Pembayaran',
			'date_paid' => 'Tanggal Bayar',
			'timestamp_created' => 'Tangggal Konfirmasi',
			'user_create' => 'User Create',
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
		$criteria->compare('reg_id',$this->reg_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('date_paid',$this->date_paid,true);
		$criteria->compare('timestamp_created',$this->timestamp_created,true);
		$criteria->compare('user_create',$this->user_create,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegistrantPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
