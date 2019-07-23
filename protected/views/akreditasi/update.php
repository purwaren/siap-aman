<?php
/* @var $this AkreditasiController */
/* @var $model PengajuanAkreditasiCustom */

$this->breadcrumbs=array(
	'Pengajuan Akreditasi Customs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PengajuanAkreditasiCustom', 'url'=>array('index')),
	array('label'=>'Create PengajuanAkreditasiCustom', 'url'=>array('create')),
	array('label'=>'View PengajuanAkreditasiCustom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PengajuanAkreditasiCustom', 'url'=>array('admin')),
);
?>

<h1>Update PengajuanAkreditasiCustom <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>