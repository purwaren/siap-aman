<?php
/**
 * Class UploadBerkasAkreditasiForm
 */

class UploadBerkasAkreditasiForm extends CFormModel
{
    public $file;
    public $type;
    public $description;
    public $filename;

    public function rules()
    {
        return array(
            array('file, type', 'required')
        );
    }

    public function save() {
        $this->file = CUploadedFile::getInstanceByName('file_data');
        $filename = 'file_'.date('YmdHis').'_'.rand(100, 9999).'.'.$this->file->extensionName;
        $path = Yii::app()->params['uploadPath']['doc'].$filename;
        $this->filename = Yii::app()->params['urlDoc'].$filename;
        $original_name = $this->file->name;
        if ($this->file->saveAs($path)) {
            $berkas = new BerkasAkreditasiCustom();
            $pengajuan = PengajuanAkreditasiCustom::getInstance();
            $berkas->id_pengajuan = $pengajuan->id;
            $berkas->file_path = $this->filename;
            $berkas->deskripsi = $original_name;
            $berkas->tipe_berkas = $this->type;
            $berkas->created_by = Yii::app()->user->getName();
            $berkas->created_at = new CDbExpression('NOW()');
            return $berkas->save();
        }
    }
}