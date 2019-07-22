<?php
/**
 * Class SudinForm
 */

class SudinForm extends CFormModel
{
    public $nama;
    public $alamat;
    public $no_telp;
    public $no_fax;
    public $email;
    public $website;
    public $id_regency;
    public $id;

    public function rules()
    {
        return array(
            array('nama, alamat, no_telp, id_regency', 'required'),
            array('nama, alamat, no_telp, no_fax, email, website, id_regency', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'no_telp' => 'Nomor Telepon',
            'no_fax' => 'Nomor Fax',
            'id_regency' => 'Wilayah'
        );
    }

    public function save() {
        if ($this->validate()) {
            $model = new SudinCustom();
            $model->attributes = $this->attributes;
            $model->created_by = Yii::app()->user->getName();
            $model->created_at = new CDbExpression('NOW()');
            if ($model->save()) {
                $this->id = $model->id;
                return true;
            }
        }
    }
}