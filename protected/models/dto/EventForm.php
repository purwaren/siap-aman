<?php
/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 9/22/17
 * Time: 8:54 PM
 */

class EventForm extends CFormModel
{
    public $title;
    public $description;
    public $location;
    public $datetime;
    public $id;

    public function rules()
    {
        return array(
            array('title, description, location, datetime', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => 'Nama Kegiatan',
            'description' => 'Deskripsi',
            'location' => 'Lokasi',
            'datetime' => 'Waktu Pelaksanaan'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            if(empty($this->id))
            {
                $model = new Event();
                $model->attributes = $this->attributes;
                $model->user_create = Yii::app()->user->getName();
                $model->timestamp_create = new CDbExpression('NOW()');

            }
            else
            {
                $model = Event::model()->findByPk($this->id);
                $model->attributes = $this->attributes;
                $model->id = $this->id;
                $model->user_update = Yii::app()->user->getName();
                $model->timestamp_update = new CDbExpression('NOW()');
            }

            //break datetime
            $tmp = explode('-', $this->datetime);
            $model->start_date = trim(str_replace('/', '-', $tmp[0]));
            $model->end_date = trim(str_replace('/', '-', $tmp[1]));

            if($model->save())
            {
                $this->id = $model->id;
                return true;
            }
            else
            {
                $this->addErrors($model->getErrors());
                $this->addError('datetime', $model->getError('start_date'));
                $this->addError('datetime', $model->getError('end_date'));
            }
        }
    }
}