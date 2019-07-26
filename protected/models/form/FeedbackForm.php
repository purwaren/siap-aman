<?php
/**
 * Class FeedbackForm
 */

class FeedbackForm extends CFormModel
{
    public $message;
    public $status_pengajuan;
    public $id_pengajuan;

    public function rules()
    {
        return array(
            array('message, status_pengajuan, id_pengajuan', 'required')
        );
    }

    /**
     * @return bool
     * @throws CDbException
     */
    public function save() {
        if ($this->validate()) {
            $pengajuan = PengajuanAkreditasiCustom::model()->findByPk($this->id_pengajuan);
            $pengajuan->status = $this->status_pengajuan;
            if ($pengajuan->update(array('status'))) {
                $feedback = new FeedbackCustom();
                $feedback->id_pengajuan = $this->id_pengajuan;
                $feedback->from = Yii::app()->user->getId();
                $feedback->to = $pengajuan->idKlinik->id_user;
                $feedback->message = $this->message;
                $feedback->created_by = Yii::app()->user->getName();
                $feedback->created_at = new CDbExpression('NOW()');
                return $feedback->save();
            }
        }
    }
}