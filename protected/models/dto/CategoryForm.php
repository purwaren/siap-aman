<?php

/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/20/16
 * Time: 12:40
 */
class CategoryForm extends CFormModel
{
    public $name;
    public $description;
    public $data;

    public function rules()
    {
        return array(
            array('name, description','required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name'=>'Nama Kategori',
            'description'=>'Keterangan'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            $model = new Category();
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
        else return false;
    }
}