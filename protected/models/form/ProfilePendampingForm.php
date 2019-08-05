<?php
/**
 * Class ProfilePendampingForm
 */

class ProfilePendampingForm extends CFormModel
{
    //basic info
    public $id;
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
            array('nama, tempat_lahir, tgl_lahir', 'required'),
            array('nama, gelar_depan, gelar_belakang, tempat_lahir, tgl_lahir, jabatan, alamat, no_hp, email, alamat_1, alamat_2, kecamatan, kota, provinsi', 'safe')
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

    /**
     * @return bool
     * @throws CDbException
     */
    public function save() {
        //save pendamping
        $pendamping = PendampingCustom::model()->findByPk($this->id);
        if (!empty($this->nama)) {
            $pendamping->nama = $this->nama;
        }
        if (!empty($this->gelar_depan)) {
            $pendamping->gelar_depan = $this->gelar_depan;
        }
        if (!empty($this->gelar_belakang)) {
            $pendamping->gelar_belakang = $this->gelar_belakang;
        }
        if (!empty($this->tempat_lahir)) {
            $pendamping->tempat_lahir = $this->tempat_lahir;
        }
        if (!empty($this->tgl_lahir)) {
            $pendamping->tgl_lahir = $this->tgl_lahir;
        }
        if (!empty($this->jabatan)) {
            $pendamping->jabatan = $this->jabatan;
        }
        if (!empty($this->no_hp)) {
            $pendamping->no_hp = $this->no_hp;
        }
        if (!empty($this->email)) {
            $pendamping->email = $this->email;
        }


        $pendamping->updated_at = new CDbExpression('NOW()');
        $pendamping->updated_by = Yii::app()->user->getName();

        if ($pendamping->update(array('nama','gelar_depan','gelar_belakang','tempat_lahir','tgl_lahir','jabatan','no_hp', 'email'))) {
            //save alamat
            if (!empty($pendamping->alamat)) {
                $alamat = $pendamping->alamat0;
            } else {
                $alamat = new AlamatCustom();
            }

            $alamat->alamat_1 = $this->alamat_1;
            $alamat->alamat_2 = $this->alamat_2;
            $alamat->kecamatan = $this->kecamatan;
            $alamat->kota = $this->kota;
            $alamat->provinsi = $this->provinsi;
            if ($alamat->save()) {
                $pendamping->alamat = $alamat->id;
                $pendamping->update(array('alamat'));
            }
            return true;
        }
    }
}