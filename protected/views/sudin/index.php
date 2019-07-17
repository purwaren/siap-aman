<?php
/* @var $this SudinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sudins',
);

$this->menu=array(
	array('label'=>'Create Sudin', 'url'=>array('create')),
	array('label'=>'Manage Sudin', 'url'=>array('admin')),
);
?>

<h1>Sudins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
