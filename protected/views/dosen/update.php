<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dosen', 'url'=>array('index')),
	array('label'=>'Create Dosen', 'url'=>array('create')),
	array('label'=>'View Dosen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>Update Dosen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>