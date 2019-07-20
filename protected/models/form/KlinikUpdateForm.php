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
            array('nama, no_izin, penanggung_jawab, tingkatan, alamat_1, kecamatan, kota, provinsi, no_telp, email, 
            qty_tempat_tidur, penyelenggaraan','required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'alamat_1' => 'Alamat (Jalan/RT/RW)',
            'alamat_2' => 'Alamat (Perumahan/Kelurahan)',
            'qty_tempat_tidur' => 'Jumlah Tempat Tidur',
            'penyelenggaraan' => 'Kemampuan Penyelenggaraan',
            'karakteristik' => 'Jenis Klinik'
        );
    }

    /**
     * Get instance for this model
     * @param $id_user
     * @return KlinikUpdateForm
     */
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

    /**
     * @throws CDbException
     */
    public function save() {
        if ($this->validate()) {
            //save data klinik
            $klinik = KlinikCustom::model()->findByAttributes(array('id_user'=>$this->id_user));
            if (!empty($klinik)) {
                $klinik->attributes = $this->attributes;
                $klinik->updated_at = new CDbExpression('NOW()');
                $klinik->updated_by = Yii::app()->user->getName();
                $klinik->update(array('kode_klinik','nama','no_izin', 'kepemilikan', 'penanggung_jawab','karakteristik',
                    'tingkatan','updated_at','updated_by'));
                Yii::app()->user->setFlash('success', 'Data klinik telah diperbarui');
            }

            //save data alamat
            $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (empty($alamat)) {
                $alamat = new AlamatCustom();
            }
            $alamat->attributes = $this->attributes;
            $alamat->id_klinik = $klinik->id;
            $alamat->save();

            //save data kontak
            $kontak = KontakCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (empty($kontak)) {
                $kontak = new KontakCustom();
            }
            $kontak->attributes = $this->attributes;
            $kontak->id_klinik = $klinik->id;
            $kontak->save();

            //save data fasilitas klinik
            $fasilitas = FasilitasKlinikCustom::model()->findByAttributes(array('id_klinik'=>$klinik->id));
            if (empty($fasilitas)) {
                $fasilitas = new FasilitasKlinikCustom();
            }
            $fasilitas->attributes = $this->attributes;
            $fasilitas->id_klinik = $klinik->id;
            $fasilitas->save();

            return true;
        }
    }
}