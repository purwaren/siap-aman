<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $permalink
 * @property string $summary
 * @property string $content
 * @property string $banner
 * @property integer $flag_published
 * @property string $timestamp_created
 * @property string $timestamp_updated
 * @property string $user_create
 * @property string $user_update
 * @property integer $cat_id
 * @property string $tag
 *
 */
class News extends CActiveRecord
{
	const FLAG_PUBLISHED_ACTIVE = 1;
	const FLAG_PUBLISHED_INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, permalink, summary, content, banner, flag_published, timestamp_created, user_create, cat_id', 'required'),
			array('flag_published, cat_id', 'numerical', 'integerOnly'=>true),
			array('title, permalink, banner', 'length', 'max'=>128),
			array('summary', 'length', 'max'=>1024),
			array('user_create, user_update', 'length', 'max'=>32),
			array('timestamp_updated, tag', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, permalink, summary, content, banner, flag_published, timestamp_created, timestamp_updated, user_create, user_update, cat_id', 'safe', 'on'=>'search'),
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
			'title' => 'Judul',
			'permalink' => 'Permalink (tautan-rapih)',
			'summary' => 'Ringkasan Artikel',
			'content' => 'Isi Artikel',
			'banner' => 'Banner',
			'flag_published' => 'Status Publikasi',
			'timestamp_created' => 'Timestamp Created',
			'timestamp_updated' => 'Timestamp Updated',
			'user_create' => 'User Create',
			'user_update' => 'User Update',
			'cat_id' => 'Katergori',
			'tag'=>'Unit'
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('permalink',$this->permalink,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('banner',$this->banner,true);
		$criteria->compare('flag_published',$this->flag_published);
		$criteria->compare('timestamp_created',$this->timestamp_created,true);
		$criteria->compare('timestamp_updated',$this->timestamp_updated,true);
		$criteria->compare('user_create',$this->user_create,true);
		$criteria->compare('user_update',$this->user_update,true);
		$criteria->compare('cat_id',$this->cat_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'timestamp_created DESC, timestamp_updated DESC'
			),
			'pagination'=>array('pageSize'=>5)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
