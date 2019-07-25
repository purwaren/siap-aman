<?php
/**
 * Class FeedbackForm
 */

class FeedbackForm extends CFormModel
{
    public $message;
    public $status_pengajuan;

    public function rules()
    {
        return array(
            array('message, status_pengajuan', 'required')
        );
    }

    public function save() {

    }
}