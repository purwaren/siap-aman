<?php
/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/17/16
 * Time: 18:56
 */


class RedactorUploadForm extends CFormModel
{
    public $type;
    public $file;
    public $filename;

    public function rules()
    {
        return array(
            array('type, file', 'required'),
            array('file', 'file', 'on'=>'image, banner', 'types'=>'jpg,png,jpeg,gif'),
            array('file', 'file', 'on'=>'file', 'types'=>'pdf')
        );
    }

    public function save($path)
    {
        $this->file = ($this->type == 'image'||$this->type=='file')?CUploadedFile::getInstanceByName('file'):CUploadedFile::getInstanceByName('file_data');
        if($this->validate())
        {
            $this->filename = date('YmdHis').'.'.$this->file->extensionName;
            $path .= $this->filename;
            return $this->file->saveAs($path);
        }
        else return false;
    }
}