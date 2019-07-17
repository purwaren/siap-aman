<?php
/* @var $this RegistrantController */
/* @var $model Registrant */

$this->breadcrumbs=array(
	'Registrants'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Registrant', 'url'=>array('index')),
	array('label'=>'Create Registrant', 'url'=>array('create')),
	array('label'=>'View Registrant', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Registrant', 'url'=>array('admin')),
);
?>

<h1>Update Registrant <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>