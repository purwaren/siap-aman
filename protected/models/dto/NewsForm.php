<?php

/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/18/16
 * Time: 13:04
 */
class NewsForm extends CFormModel
{
    public $title;
    public $permalink;
    public $summary;
    public $content;
    public $banner;
    public $cat_id;
    public $flag_published;
    public $data;
    public $isNewRecord = true;
    public $tag;

    public function rules()
    {
        return array(
            array('title, permalink, summary, content, banner, cat_id, flag_published', 'required'),
            array('tag','safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'title'=>'Judul Berita',
            'permalink'=>'Permalink (tautan rapih)',
            'summary'=>'Ringkasan Berita',
            'content'=>'Isi Berita',
            'banner'=>'Banner',
            'cat_id'=>'Kategori',
            'flag_published'=>'Status Publikasi',
            'tag'=>'Unit'
        );
    }

    public static function getAllFlagPublishedOptions()
    {
        return array(
            News::FLAG_PUBLISHED_ACTIVE => 'Ya',
            News::FLAG_PUBLISHED_INACTIVE => 'Tidak'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            $model = new News();
            $model->attributes = $this->attributes;
            $model->timestamp_created = new CDbExpression('NOW()');
            $model->user_create = Yii::app()->user->getName();
            if($model->save())
            {
                $this->data = $model;
                return true;
            }
            else
            {
                $this->addErrors($model->getErrors());
                return false;
            }
        }
    }
}