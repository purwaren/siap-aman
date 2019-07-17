<?php
/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/17/18
 * Time: 9:23 PM
 */

class DosenForm extends CFormModel
{
    const TYPE_MALE = 'L';
    const TYPE_FEMALE = 'P';

    const TYPE_WNI = 'WNI';
    const TYPE_WNA = 'WNA';

    public static function getAllJenisKelaminOptions()
    {
        return array(
            self::TYPE_MALE => 'Laki-Laki',
            self::TYPE_FEMALE => 'Perempuan'
        );
    }

    public static function getAllKewarganegaraanOptions()
    {
        return array(
            self::TYPE_WNI => 'Warga Negara Indonesia',
            self::TYPE_WNA => 'Warga Negara Asing'
        );
    }

    public static function getAllAgamaOptions()
    {
        return array(
            'Islam' => 'Islam',
            'Katolik' => 'Katolik',
            'Protestan' => 'Protestan',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
            'Konghucu' => 'Konghucu'
        );
    }

}