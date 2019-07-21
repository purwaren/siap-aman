<?php
/**
 * Class UploadBerkasAkreditasiForm
 * @property CUploadedFile $file
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

    /**
     * @throws Exception
     */
    public function readFile() {
        if ($this->file->extensionName == 'xls' || $this->file->extensionName == 'xlsx') {
            $objReader = new PHPExcel_Reader_Excel5();
            $objReader = $objReader->load($this->filename);
            $sheetData = $objReader->getSheetByName('CAPAIAN AKHIR');
            $score1 = $sheetData->getCell('E9')->getCalculatedValue();
            $score2 = $sheetData->getCell('E10')->getCalculatedValue();
            $score3 = $sheetData->getCell('E11')->getCalculatedValue();
            $score4 = $sheetData->getCell('E12')->getCalculatedValue();

            $bab1 = new SAResumeCustom();
            $bab1->bab = 'I';
            $bab1->score = $score1;
            $bab1->created_by = Yii::app()->user->getName();
            $bab1->created_at = new CDbExpression('NOW()');
            $bab1->save();

            $bab2 = new SAResumeCustom();
            $bab2->bab = 'II';
            $bab2->score = $score2;
            $bab2->created_by = Yii::app()->user->getName();
            $bab2->created_at = new CDbExpression('NOW()');
            $bab2->save();

            $bab3 = new SAResumeCustom();
            $bab3->bab = 'III';
            $bab3->score = $score3;
            $bab3->created_by = Yii::app()->user->getName();
            $bab3->created_at = new CDbExpression('NOW()');
            $bab3->save();

            $bab4 = new SAResumeCustom();
            $bab4->bab = 'IV';
            $bab4->score = $score3;
            $bab4->created_by = Yii::app()->user->getName();
            $bab4->created_at = new CDbExpression('NOW()');
            $bab4->save();
        }
    }
}