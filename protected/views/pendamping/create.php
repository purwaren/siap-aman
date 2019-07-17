<?php
/* @var $this PendampingController */
/* @var $model Pendamping */

$this->breadcrumbs=array(
	'Pendampings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pendamping', 'url'=>array('index')),
	array('label'=>'Manage Pendamping', 'url'=>array('admin')),
);
?>

<h1>Create Pendamping</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>