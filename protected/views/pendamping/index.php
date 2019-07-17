<?php
/* @var $this PendampingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pendampings',
);

$this->menu=array(
	array('label'=>'Create Pendamping', 'url'=>array('create')),
	array('label'=>'Manage Pendamping', 'url'=>array('admin')),
);
?>

<h1>Pendampings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
