<?php
/* @var $this AkreditasiController */
/* @var $model PengajuanAkreditasiCustom */

$this->breadcrumbs=array(
	'Pengajuan Akreditasi Customs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PengajuanAkreditasiCustom', 'url'=>array('index')),
	array('label'=>'Create PengajuanAkreditasiCustom', 'url'=>array('create')),
	array('label'=>'Update PengajuanAkreditasiCustom', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PengajuanAkreditasiCustom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PengajuanAkreditasiCustom', 'url'=>array('admin')),
);
?>

<h1>View PengajuanAkreditasiCustom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_klinik',
		'no_urut',
		'tgl_pengajuan',
		'jenis_pengajuan',
		'tgl_penetapan',
		'status',
	),
)); ?>
