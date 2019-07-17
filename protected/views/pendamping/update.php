<?php
/* @var $this PendampingController */
/* @var $model Pendamping */

$this->breadcrumbs=array(
	'Pendampings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pendamping', 'url'=>array('index')),
	array('label'=>'Create Pendamping', 'url'=>array('create')),
	array('label'=>'View Pendamping', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pendamping', 'url'=>array('admin')),
);
?>

<h1>Update Pendamping <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>