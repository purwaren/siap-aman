<?php
/**
 * Class SudinCustom
 */

class SudinCustom extends Sudin
{
    public function rules()
    {
        return parent::rules(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return array(
            'created_by' => 'Dientri Oleh',
            'created_at' => 'Waktu Entri',
            'updated_by' => 'Diperbarui Oleh',
            'updated_at' => 'Terakhir Diperbarui',
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className); // TODO: Change the autogenerated stub
    }
}