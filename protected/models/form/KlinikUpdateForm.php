<?php
/**
 * Class KlinikUpdateForm
 */

class KlinikUpdateForm extends CFormModel
{
    //generic info for klinik
    public $id_user;
    public $kode_klinik;
    public $nama;
    public $no_izin;
    public $kepemilikan;
    public $penanggung_jawab;
    public $karakteristik;
    public $tingkatan;

    //info for alamat
    public $alamat_1;
    public $alamat_2;
    public $kecamatan;
    public $kota;
    public $provinsi;

    //info for kontak
    public $no_telp;
    public $no_fax;
    public $email;
    public $website;

    //info fasilitas
    public $qty_tempat_tidur;
    public $penyelenggaraan;

    public $isNewRecord = true;

    public function rules()
    {
        return array(
            array('id_user, kode_klinik, nama, no_izin, kepemilikan, penanggung_jawab, karakteristik, tingkatan', 'safe'),
            array('alamat_1, alamat_2, kecamatan, kota, provinsi', 'safe'),
            array('no_telp, no_fax, email, website', 'safe'),
            array('qty_tempat_tidur, penyelenggaraan', 'safe'),
            array('nama, penanggung_jawab, tingkatan, alamat_1, kecamatan, kota, provinsi, no_telp, email, qty_tempat_tidur, penyelenggaraan','required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'alamat_1' => 'Alamat Baris Pertama',
            'alamat_2' => 'Alamat Baris Kedua',
            'qty_tempat_tidur' => 'Jumlah Tempat Tidur',
            'penyelenggaraan' => 'Kemampuan Penyelenggaraan'
        );
    }

    public static function getInstance($id_user) {
        $form = new KlinikUpdateForm();
        $klinik = KlinikCustom::model()->findByAttributes(array('id_user'=>$id_user));
        if (!empty($klinik)) {
            $form->isNewRecord = false;
            $form->attributes = $klinik->attributes;

            //retrieve alamat, kontak & fasilitas
            $address = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (!empty($address)) {
                $form->alamat_1 = $address->alamat_1;
                $form->alamat_2 = $address->alamat_2;
                $form->kecamatan = $address->kecamatan;
                $form->kota = $address->kota;
                $form->provinsi = $address->provinsi;
            }
            $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (!empty($kontak)) {
                $form->no_telp = $kontak->no_telp;
                $form->no_fax = $kontak->no_fax;
                $form->email = $kontak->email;
                $form->website = $kontak->website;
            }
            $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (!empty($fasilitas)) {
                $form->qty_tempat_tidur = $fasilitas->qty_tempat_tidur;
                $form->penyelenggaraan = $fasilitas->penyelenggaraan;
            }
        }
        return $form;
    }
}