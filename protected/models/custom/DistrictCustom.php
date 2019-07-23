<?php

/**
 * Class DistrictCustom
 */

class DistrictCustom extends RefDistricts
{
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

    public static function getAllDistrictOptions($regency_id) {
        $model = self::model()->findAllByAttributes(array('regency_id'=>$regency_id));
        $options = array();
        if (!empty($model)) {
            foreach ($model as $row) {
                $options[$row->id] = $row->name;
            }
        }
        return $options;
    }
}