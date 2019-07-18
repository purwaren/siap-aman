<?php

/**
 * Class UploadFotoKlinikForm
 */

class UploadFotoKlinikForm extends CFormModel
{
    public $photo;
    public $deskripsi;
    public $filename;

    public function save() {
        $this->photo = CUploadedFile::getInstanceByName('file_data');
        $filename = 'img_'.date('YmdHis').'_'.rand(100, 9999).'.'.$this->photo->extensionName;
        $path = Yii::app()->params['uploadPath']['photo'].$filename;
        $this->filename = Yii::app()->params['urlPhoto'].$filename;
        $original_name = $this->photo->name;
        if ($this->photo->saveAs($path)) {
            $klinik = KlinikCustom::model()->findByAttributes(array('id_user'=>Yii::app()->user->getId()));
            $foto = new FotoKlinikCustom();
            $foto->id_klinik = $klinik->id;
            $foto->path_foto = $this->filename;
            $foto->deskripsi = $original_name;
            if ($foto->save()) {
                return true;
            }
        }
    }
}