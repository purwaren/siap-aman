<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $timestamp_created
 * @property string $timestamp_updated
 * @property string $user_create
 * @property string $user_update
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, timestamp_created, user_create', 'required'),
			array('name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>512),
			array('user_create, user_update', 'length', 'max'=>32),
			array('timestamp_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, timestamp_created, timestamp_updated, user_create, user_update', 'safe', 'on'=>'search'),
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
			'news' => array(self::HAS_MANY, 'News', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nama Kategori',
			'description' => 'Deskripsi',
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
		$criteria->compare('description',$this->description,true);
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
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAllCategoryOptions()
	{
		$model = self::model()->findAll();
		$options = array();
		if($model !== null)
		{
			foreach($model as $row)
			{
				$options[$row->id] = $row->name;
			}

		}
		return $options;
	}
}
