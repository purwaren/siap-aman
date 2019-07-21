<?php
/**
 * Class PengajuanAkreditasiCustom
 */

class PengajuanAkreditasiCustom extends PengajuanAkreditasi
{
    public function rules()
    {
        return parent::rules(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className); // TODO: Change the autogenerated stub
    }

    public static function getInstance() {
        $klinik = KlinikCustom::getInstance();
        $model = self::model()->findByAttributes(array(
            'id_klinik' => $klinik->id,
            'status' => array(StatusPengajuan::DRAFT, StatusPengajuan::DIAJUKAN, StatusPengajuan::VISIT, StatusPengajuan::DITERIMA)
        ));
        if (empty($model)) {
            $model = new PengajuanAkreditasiCustom();
            $model->id_klinik = $klinik->id;
            $model->status = StatusPengajuan::DRAFT;
            $model->save();
        }
        return $model;
    }

    public static function getAllJenisPengajuanOptions() {
        return array(
            'pertama' => 'Usulan Pertama',
            'remedial' => 'Remedial',
            'perpanjangan' => 'Perpanjangan'
        );
    }

    public function getJenisPengajuan() {
        $options = self::getAllJenisPengajuanOptions();
        return $options[$this->jenis_pengajuan];
    }

    public function hasDocuments() {
        $docs = BerkasAkreditasiCustom::model()->countByAttributes(array(
            'id_pengajuan'=>$this->id
        ));
        return $docs;
    }

    /**
     * @return int|mixed
     * @throws CException
     */
    public function getLastNoUrut() {
        $cmd = Yii::app()->db->createCommand('SELECT MAX(no_urut) FROM pengajuan_akreditasi');
        $no_urut = $cmd->queryScalar();
        if (empty($no_urut)) {
            return 1;
        }
        else return $no_urut+1;
    }

    public function getStatus() {
        $options = StatusPengajuan::getAllStatusPengajuanOptions();
        return $options[$this->status];
    }

    public static function countAll() {
        return self::model()->count();
    }

    public static function countAllCanceled() {
        return self::model()->countByAttributes(array('status'=>array(StatusPengajuan::BATAL, StatusPengajuan::DITOLAK)));
    }

    public static function countAllAccept() {
        return self::model()->countByAttributes(array('status'=>array(StatusPengajuan::DITERIMA, StatusPengajuan::REKOMENDASI)));
    }
}