<?php
/* @var $this SudinController */
/* @var $model Sudin */

$this->breadcrumbs=array(
	'Sudins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sudin', 'url'=>array('index')),
	array('label'=>'Manage Sudin', 'url'=>array('admin')),
);
?>

<h1>Create Sudin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>