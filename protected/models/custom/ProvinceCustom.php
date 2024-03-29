<?php
/**
 * Class ProvinceCustom
 */

class ProvinceCustom extends RefProvinces
{
    const DKI_JAKARTA = '31';

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

    public static function getAllProvinceOptions() {
        $model = self::model()->findAllByAttributes(array('id'=>self::DKI_JAKARTA));
        $options = array();
        if (!empty($model)) {
            foreach ($model as $row) {
                $options[$row->id] = $row->name;
            }
        }
        return $options;
    }

    public static function getAllDefaultOptions() {
        $criteria = new CDbCriteria();
        $criteria->order = 'id ASC';
        $model = self::model()->findAll($criteria);
        $options = array();
        if (!empty($model)) {
            foreach ($model as $row) {
                $options[$row->id] = $row->name;
            }
        }
        return $options;
    }
}