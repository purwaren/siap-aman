<?php
/**
 * Class KlinikCustom
 */

class KlinikCustom extends Klinik
{
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_user' => 'Id User',
            'kode_klinik' => 'Kode Klinik',
            'nama' => 'Nama',
            'no_izin' => 'No Izin',
            'kepemilikan' => 'Kepemilikan',
            'penanggung_jawab' => 'Penanggung Jawab',
            'karakteristik' => 'Jenis Klinik',
            'tingkatan' => 'Tingkatan',
            'created_by' => 'Dibuat Oleh',
            'created_at' => 'Waktu Entri',
            'updated_by' => 'Diperbarui Oleh',
            'updated_at' => 'Terakhir Diberbarui',
        );
    }



    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getAllTingkatanOptions() {
        return array(
            'dasar'=>'Dasar',
            'madya'=>'Madya',
            'utama'=>'Utama',
            'paripurna'=>'Paripurna'
        );
    }

    public static function getInstance() {
        return self::model()->findByAttributes(array('id_user'=>Yii::app()->user->getId()));
    }

    public function isComplete() {
        return $this->validate();
    }



    public function hasPhotos() {
        $photos = FotoKlinikCustom::model()->countByAttributes(array(
            'id_klinik'=> $this->id
        ));
        return $photos;
    }

    public static function getAllJenisKlinikOptions() {
        return array(
            'pratama' => 'Pratama',
            'utama'=> 'Utama'
        );
    }

    public static function countAllRegisteredKlinik() {
        return self::model()->count();
    }
}