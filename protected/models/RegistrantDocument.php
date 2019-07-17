<?php

/**
 * This is the model class for table "registrant_document".
 *
 * The followings are the available columns in table 'registrant_document':
 * @property integer $id
 * @property integer $reg_id
 * @property string $name
 * @property integer $type
 * @property string $path
 * @property string $timestamp_created
 * @property string $timestamp_updated
 * @property string $user_create
 * @property string $user_update
 */
class RegistrantDocument extends CActiveRecord
{
	const TYPE_IJAZAH = 1;
	const TYPE_AKTE = 2;
	const TYPE_KK = 3;
	const TYPE_PHOTO = 4;
	const TYPE_RECEIPT = 5;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registrant_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reg_id, name, type, path, timestamp_created, user_create', 'required'),
			array('reg_id, type', 'numerical', 'integerOnly'=>true),
			array('name, path', 'length', 'max'=>128),
			array('user_create, user_update', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reg_id, name, type, path, timestamp_created, timestamp_updated, user_create, user_update', 'safe', 'on'=>'search'),
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
			'Registrant'=>array(self::BELONGS_TO, 'Registrant', 'reg_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reg_id' => 'ID Registrasi',
			'name' => 'Nama Dokumen',
			'type' => 'Type',
			'path' => 'Path',
			'timestamp_created' => 'Waktu Upload',
			'timestamp_updated' => 'Timestamp Updated',
			'user_create' => 'User Upload',
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
		$criteria->compare('reg_id',$this->reg_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('path',$this->path,true);
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
	 * @return RegistrantDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findPhotoByRegId($id)
	{
		$model = self::model()->findByAttributes(array(
			'reg_id'=>$id,
			'type'=>self::TYPE_PHOTO
		));
		if($model === null)
			return Yii::app()->theme->baseUrl.'/assets/img/no-photo.jpg';
		else
			return $model->path;
	}
}
