<?php
/* @var $this PendampingController */
/* @var $model Pendamping */

$this->breadcrumbs=array(
	'Pendampings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pendamping', 'url'=>array('index')),
	array('label'=>'Create Pendamping', 'url'=>array('create')),
	array('label'=>'Update Pendamping', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pendamping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pendamping', 'url'=>array('admin')),
);
?>

<h1>View Pendamping #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sudin',
		'id_user',
		'tipe',
		'nama',
		'gelar_depan',
		'gelar_belakang',
		'tempat_lahir',
		'tgl_lahir',
		'jabatan',
		'alamat',
		'no_hp',
		'email',
		'created_by',
		'created_at',
		'updated_by',
		'updated_at',
	),
)); ?>
