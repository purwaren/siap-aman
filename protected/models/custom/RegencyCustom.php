<?php
/**
 * Class RegencyCustom
 */

class RegencyCustom extends RefRegencies
{
    public $province_id = '31';
    public function rules()
    {
        return parent::rules(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className); // TODO: Change the autogenerated stub
    }

    public static function getAllRegencyOptions() {
        $model = self::model()->findAllByAttributes(array('province_id'=>ProvinceCustom::DKI_JAKARTA));
        $options = array();
        if (!empty($model)) {
            foreach ($model as $row) {
                $options[$row->id] = $row->name;
            }
        }
        return $options;
    }
}