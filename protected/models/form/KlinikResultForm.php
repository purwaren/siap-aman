<?php
/**
 * Class KlinikResultForm
 * @property KlinikCustom $klinik
 */

class KlinikResultForm extends CFormModel
{
    public $tingkatan;
    public $tgl_penetapan;
    public $klinik;

    public function rules()
    {
        return array(
            array('tingkatan, tgl_penetapan', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'tgl_penetapan' => 'Tanggal Penetapan'
        );
    }

    public function save() {
        if ($this->validate()) {
            $this->klinik->tingkatan = $this->tingkatan;
            $this->klinik->updated_by = Yii::app()->user->getName();
            $this->klinik->updated_at = new CDbExpression('NOW()');
            if ($this->klinik->update(array('tingkatan','updated_by','updated_at'))) {
                $pengajuan = $this->klinik->getLastPengajuan();
                $pengajuan->tgl_penetapan = $this->tgl_penetapan;
                $pengajuan->hasil = $this->tingkatan;
                return $pengajuan->update('tgl_penetapan','hasil');
            }
        }
    }
}