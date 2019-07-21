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
            $objReader = new PHPExcel_Reader_Excel2007();
            $objReader = $objReader->load($this->filename);
            $sheetData = $objReader->getSheetByName('CAPAIAN AKHIR');
            $score1 = $sheetData->getCell('D9')->getCalculatedValue();
            $score2 = $sheetData->getCell('D10')->getCalculatedValue();
            $score3 = $sheetData->getCell('D11')->getCalculatedValue();
            $score4 = $sheetData->getCell('D12')->getCalculatedValue();

            $pengajuan = PengajuanAkreditasiCustom::getInstance();
            $bab1 = SAResumeCustom::model()->findByAttributes(array('id_pengajuan'=>$pengajuan->id, 'bab'=>'I'));
            if (empty($bab1)) {
                $bab1 = new SAResumeCustom();
                $bab1->created_by = Yii::app()->user->getName();
                $bab1->created_at = new CDbExpression('NOW()');
            } else {
                $bab1->updated_by = Yii::app()->user->getName();
                $bab1->updated_at = new CDbExpression('NOW()');
            }

            $bab1->id_pengajuan = $pengajuan->id;
            $bab1->bab = 'I';
            $bab1->score = $score1;
            $bab1->save();

            $bab2 = SAResumeCustom::model()->findByAttributes(array('id_pengajuan'=>$pengajuan->id, 'bab'=>'II'));
            if (empty($bab2)) {
                $bab2 = new SAResumeCustom();
                $bab2->created_by = Yii::app()->user->getName();
                $bab2->created_at = new CDbExpression('NOW()');
            } else {
                $bab2->updated_by = Yii::app()->user->getName();
                $bab2->updated_at = new CDbExpression('NOW()');
            }

            $bab2->id_pengajuan = $pengajuan->id;
            $bab2->bab = 'II';
            $bab2->score = $score2;
            $bab2->save();

            $bab3 = SAResumeCustom::model()->findByAttributes(array('id_pengajuan'=>$pengajuan->id, 'bab'=>'II'));
            if (empty($bab3)) {
                $bab3 = new SAResumeCustom();
                $bab3->created_by = Yii::app()->user->getName();
                $bab3->created_at = new CDbExpression('NOW()');
            } else {
                $bab3->updated_by = Yii::app()->user->getName();
                $bab3->updated_at = new CDbExpression('NOW()');
            }

            $bab3->id_pengajuan = $pengajuan->id;
            $bab3->bab = 'III';
            $bab3->score = $score3;
            $bab3->save();

            $bab4 = new SAResumeCustom();
            $bab4->id_pengajuan = $pengajuan->id;
            $bab4->bab = 'IV';
            $bab4->score = $score4;
            $bab4->created_by = Yii::app()->user->getName();
            $bab4->created_at = new CDbExpression('NOW()');
            $bab4->save();
        }
    }
}