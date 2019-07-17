<?php
/* @var $this KlinikController */
/* @var $model Klinik */

$this->breadcrumbs=array(
	'Kliniks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Klinik', 'url'=>array('index')),
	array('label'=>'Manage Klinik', 'url'=>array('admin')),
);
?>

<h1>Create Klinik</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>