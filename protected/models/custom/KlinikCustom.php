<?php
/**
 * Class KlinikCustom
 */

class KlinikCustom extends Klinik
{
    public $id_regency;

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
            'id_regency' => 'Wilayah'
        );
    }

    public function rules()
    {
        return array_merge(parent::rules(),array(
            array('id_regency','safe')
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getAllTingkatanOptions() {
        return array(
            'belum'=>'Belum Akreditasi',
            'dasar'=>'Dasar',
            'madya'=>'Madya',
            'utama'=>'Utama',
            'paripurna'=>'Paripurna'
        );
    }

    public function getTingkatan() {
        $options = self::getAllTingkatanOptions();
        if (!empty($this->tingkatan)) {
            return $options[$this->tingkatan];
        } else {
            return null;
        }
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
        $criteria = new CDbCriteria();
        if (Yii::app()->user->isSudin() || Yii::app()->user->isPendamping()) {
            $criteria->join = 'left join alamat t2 on t2.id_klinik = t.id';
            $criteria->compare('t2.kota', Yii::app()->user->regency_id);
        }
        return self::model()->count($criteria);
    }

    /**
     * @return CActiveDataProvider
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('id_user',$this->id_user);
        $criteria->compare('kode_klinik',$this->kode_klinik,true);
        $criteria->compare('nama',$this->nama,true);
        $criteria->compare('no_izin',$this->no_izin,true);
        $criteria->compare('kepemilikan',$this->kepemilikan,true);
        $criteria->compare('penanggung_jawab',$this->penanggung_jawab,true);
        $criteria->compare('karakteristik',$this->karakteristik,true);
        $criteria->compare('tingkatan',$this->tingkatan,true);
        $criteria->compare('created_by',$this->created_by,true);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('updated_by',$this->updated_by,true);
        $criteria->compare('updated_at',$this->updated_at,true);

        if (!empty($this->id_regency)) {
            $criteria->join = 'left join alamat t2 on t2.id_klinik = t.id';
            $criteria->compare('t2.kota', $this->id_regency);
        }

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @return CActiveDataProvider
     */
    public function searchForResult()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('nama',$this->nama,true);

        $criteria->join = 'LEFT JOIN pengajuan_akreditasi t2 ON t2.id_klinik = t.id LEFT JOIN alamat t3 on t3.id_klinik = t.id';
        $criteria->addInCondition('t2.status',array(StatusPengajuan::DIAJUKAN, StatusPengajuan::VISIT, StatusPengajuan::DITERIMA, StatusPengajuan::DRAFT, StatusPengajuan::REKOMENDASI));
        $criteria->addCondition('t2.id IS NULL', 'OR');
        $criteria->compare('t3.kota', $this->id_regency);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @return |null
     */
    public function getRegency() {
        $alamat = AlamatCustom::model()->findByAttributes(array('id_klinik'=>$this->id));
        if (!empty($alamat)) {
            return $alamat->getRegency();
        }
        else {
            return null;
        }
    }

    /**
     * @return PengajuanAkreditasiCustom
     */
    public function getLastPengajuan() {
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('id_klinik', $this->id);

        return PengajuanAkreditasiCustom::model()->find($criteria);
    }

    /**
     * @return bool
     */
    public function isAccepted() {
        $pengajuan = $this->getLastPengajuan();
        if (!empty($pengajuan)) {
            return $pengajuan->status >= StatusPengajuan::DITERIMA;
        }
    }
}