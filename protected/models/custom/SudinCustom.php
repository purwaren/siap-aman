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

    /**
     *
     */
    public static function getAllSudinOptions() {
        $model = self::model()->findAll();
        $options = array();
        foreach ($model as $row) {
            $options[$row->id] = $row->nama;
        }
        return $options;
    }

    public static function countAvailableKlinik() {
        $criteria = new CDbCriteria();
        $criteria->select = 'SUM(jumlah_klinik) AS jumlah_klinik';
        if (Yii::app()->user->isSudin()) {
            $criteria->compare('id_regency', Yii::app()->user->regency_id);
        }

//        $model = self::model()->find($criteria);
//        if (!empty($model)) {
//            return $model->jumlah_klinik;
//        }
//        else return 0;
        return 831;
    }
}