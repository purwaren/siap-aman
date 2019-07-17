<?php
/* @var $this KlinikController */
/* @var $model Klinik */

$this->breadcrumbs=array(
	'Kliniks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Klinik', 'url'=>array('index')),
	array('label'=>'Create Klinik', 'url'=>array('create')),
	array('label'=>'Update Klinik', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Klinik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Klinik', 'url'=>array('admin')),
);
?>

<h1>View Klinik #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kode_klinik',
		'nama',
		'no_izin',
		'kepemilikan',
		'penanggung_jawab',
		'karakteristik',
		'tingkatan',
		'created_by',
		'created_at',
		'updated_by',
		'updated_at',
	),
)); ?>
