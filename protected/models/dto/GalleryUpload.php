<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 16/05/16
 * Time: 21:53
 * @property CUploadedFile $file
 */
class GalleryUpload extends CFormModel
{
    public $albumId;
    public $caption;
    public $file;
    
    public function rules()
    {
        return array(
            array('albumId, file','required'),
            array('file','file','types'=>'jpg, png, gif','on'=>'image'),
            //array('file','file','types'=>'mp4, mpg, avi','on'=>'image')
        );
    }

    public function save()
    {
        if($this->validate())
        {
            //create directory first
            $baseDir = Yii::app()->params['uploadPath']['album'].$this->albumId;
            if(!is_dir($baseDir))
                CFileHelper::createDirectory($baseDir);
            //save file
            $filePath = $baseDir.'/'.$this->file->name;
            if($this->file->saveAs($filePath))
            {
                //save record to album content
                $fileUrl = Yii::app()->params['albumUrl'].$this->albumId.'/'.$this->file->name;
                $model = new AlbumContent();
                $model->album_id = $this->albumId;
                $model->filepath = $fileUrl;
                $model->caption = $this->file->name;
                $model->user_create = Yii::app()->user->getName();
                $model->timestamp_created = new CDbExpression('NOW()');
                if($model->save())
                    return true;
                else 
                {
                    $this->addErrors($model->getErrors());
                    return false;
                }
            } else return false;
        } else return false;
    }
}