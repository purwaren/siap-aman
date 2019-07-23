<?php

class WilayahController extends Controller
{
	public function actionKecamatan($id_kota)
	{
		$model = DistrictCustom::model()->findAllByAttributes(array('regency_id'=>$id_kota));
		$options = array();
		if (!empty($model)) {
		    foreach ($model as $row) {
		        $item = new Select2Options();
		        $item->id = $row->id;
		        $item->text = $row->name;
		        $options[] = $item;
            }
        }

		echo CJSON::encode($options);
	}
}