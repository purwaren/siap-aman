<?php

/**
 * This is the model class for table "feedback".
 *
 * The followings are the available columns in table 'feedback':
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property integer $id_pengajuan
 * @property string $message
 * @property integer $flag_read
 * @property string $created_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Users $from0
 * @property PengajuanAkreditasi $idPengajuan
 * @property Users $to0
 */
class Feedback extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feedback';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from, to, id_pengajuan, message, flag_read, created_by', 'required'),
			array('from, to, id_pengajuan, flag_read', 'numerical', 'integerOnly'=>true),
			array('created_by', 'length', 'max'=>32),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from, to, id_pengajuan, message, flag_read, created_by, created_at', 'safe', 'on'=>'search'),
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
			'from0' => array(self::BELONGS_TO, 'Users', 'from'),
			'idPengajuan' => array(self::BELONGS_TO, 'PengajuanAkreditasi', 'id_pengajuan'),
			'to0' => array(self::BELONGS_TO, 'Users', 'to'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'from' => 'From',
			'to' => 'To',
			'id_pengajuan' => 'Id Pengajuan',
			'message' => 'Message',
			'flag_read' => 'Flag Read',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
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
		$criteria->compare('from',$this->from);
		$criteria->compare('to',$this->to);
		$criteria->compare('id_pengajuan',$this->id_pengajuan);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('flag_read',$this->flag_read);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedback the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
