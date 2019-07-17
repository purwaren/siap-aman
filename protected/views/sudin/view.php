<?php
/* @var $this SudinController */
/* @var $model Sudin */

$this->breadcrumbs=array(
	'Sudins'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sudin', 'url'=>array('index')),
	array('label'=>'Create Sudin', 'url'=>array('create')),
	array('label'=>'Update Sudin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sudin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sudin', 'url'=>array('admin')),
);
?>

<h1>View Sudin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'no_telp',
		'no_fax',
		'email',
		'website',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	),
)); ?>
