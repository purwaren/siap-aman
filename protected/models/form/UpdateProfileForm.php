<?php


class UpdateProfileForm extends CFormModel
{
    public $pict;
    public $name;
    public $email;

    public function rules()
    {
        return array(
            array('pict, name, email', 'required')
        );
    }

}