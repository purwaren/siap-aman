<?php

/**
 * Class UploadFotoKlinikForm
 */

class UploadFotoKlinikForm extends CFormModel
{
    public $photo;
    public $deskripsi;

    public function save() {
        $this->photo = CUploadedFile::getInstanceByName('file_data');
    }
}