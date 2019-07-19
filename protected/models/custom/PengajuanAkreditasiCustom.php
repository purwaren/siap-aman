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
            'status' => StatusPengajuan::DRAFT
        ));
        if (empty($model)) {
            $model = new PengajuanAkreditasiCustom();
            $model->id_klinik = $klinik->id;
            $model->status = StatusPengajuan::DRAFT;
            $model->save();
        }
        return $model;
    }

    public function hasDocuments() {
        $docs = BerkasAkreditasiCustom::model()->countByAttributes(array(
            'id_pengajuan'=>$this->id
        ));
        return $docs;
    }
}