<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Hak Akses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Authitem', 'url'=>array('index')),
	array('label'=>'Create Authitem', 'url'=>array('create')),
	array('label'=>'Update Authitem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Authitem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Authitem', 'url'=>array('admin')),
);
?>

<h1>Detil Akses : <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
