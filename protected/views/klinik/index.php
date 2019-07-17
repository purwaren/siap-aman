<?php
/* @var $this KlinikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kliniks',
);

$this->menu=array(
	array('label'=>'Create Klinik', 'url'=>array('create')),
	array('label'=>'Manage Klinik', 'url'=>array('admin')),
);
?>

<h1>Kliniks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
