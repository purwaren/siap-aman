<?php
/**
 * Class ProfilePendampingForm
 */

class ProfilePendampingForm extends CFormModel
{
    //basic info
    public $nama;
    public $gelar_depan;
    public $gelar_belakang;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jabatan;
    public $alamat;
    public $no_hp;
    public $email;

    //contact info
    public $alamat_1;
    public $alamat_2;
    public $kecamatan;
    public $kota;
    public $provinsi;

    public function rules()
    {
        return array(
            array('nama, tempat_lahir, tgl_lahir', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'tgl_lahir' => 'Tanggal Lahir',
            'no_hp' => 'Nomor HP',
            'alamat_1' => 'Alamat (Jalan/RT/RW)',
            'alamat_2' => 'Alamat (Perumahan/Kelurahan)',
        );
    }
}