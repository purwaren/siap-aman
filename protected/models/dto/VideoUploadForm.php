<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 16/05/16
 * Time: 21:53
 * @property CUploadedFile $file
 */
class VideoUploadForm extends CFormModel
{
    public $albumId;
    public $captions;
    public $files;
    
    public function rules()
    {
        return array(
            array('albumId, files, captions','required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'files' => 'URL Video (Harus link YouTube)',
            'captions' => 'Deskripsi Video'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            foreach ($this->files as $idx => $fileUrl)
            {
                if(!empty($fileUrl))
                {
                    //save record to album content
                    $model = new AlbumContent();
                    $model->album_id = $this->albumId;
                    $model->filepath = $fileUrl;
                    $model->caption = $this->captions[$idx];
                    $model->user_create = Yii::app()->user->getName();
                    $model->timestamp_created = new CDbExpression('NOW()');
                    $model->save();
                }
            }
            return true;
        }
        else return false;
    }
}