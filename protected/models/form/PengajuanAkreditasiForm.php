<?php
/**
 * Class PengajuanAkreditasiForm
 * @property PengajuanAkreditasiCustom $pengajuan
 */

class PengajuanAkreditasiForm extends CFormModel
{
    public $jenis_pengajuan;
    public $pengajuan;

    public function rules()
    {
        return array(
            array('jenis_pengajuan, pengajuan','required')
        );
    }

    public function save() {
        if ($this->validate()) {
            $this->pengajuan->tgl_pengajuan = new CDbExpression('NOW()');
            $this->pengajuan->jenis_pengajuan = $this->jenis_pengajuan;
            $this->pengajuan->no_urut = $this->pengajuan->getLastNoUrut();
            $this->pengajuan->status = StatusPengajuan::DIAJUKAN;
            return $this->pengajuan->update(array('tgl_pengajuan','jenis_pengajuan','no_urut','status'));
        }
    }
}