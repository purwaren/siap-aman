<?php
/* @var $this SudinController */
/* @var $model Sudin */

$this->breadcrumbs=array(
	'Sudins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sudin', 'url'=>array('index')),
	array('label'=>'Create Sudin', 'url'=>array('create')),
	array('label'=>'View Sudin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sudin', 'url'=>array('admin')),
);
?>

<h1>Update Sudin <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>