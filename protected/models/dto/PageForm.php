<?php

/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/17/16
 * Time: 16:35
 */
class PageForm extends CFormModel
{
    public $title;
    public $permalink;
    public $content;
    public $flag_published;
    public $data;
    public $isNewRecord=true;

    public function rules()
    {
        return array(
            array('title, permalink, content, flag_published', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'title'=>'Judul Halaman',
            'permalink' => 'Permalink (tautan yang rapih)',
            'content'=>'Isi Halaman',
            'flag_published'=>'Status Publikasi'
        );
    }

    public static function getAllFlagPublishedOptions()
    {
        return array(
            Page::FLAG_PUBLISHED_ACTIVE => 'Ya',
            Page::FLAG_PUBLISHED_INACTIVE => 'Tidak'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            $model = new Page();
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