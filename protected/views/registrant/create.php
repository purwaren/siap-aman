<?php
/* @var $this RegistrantController */
/* @var $model Registrant */

$this->breadcrumbs=array(
	'Registrants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Registrant', 'url'=>array('index')),
	array('label'=>'Manage Registrant', 'url'=>array('admin')),
);
?>

<h1>Create Registrant</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>