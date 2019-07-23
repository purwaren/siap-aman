<?php
/* @var $this AkreditasiController */
/* @var $model PengajuanAkreditasiCustom */

$this->breadcrumbs=array(
	'Pengajuan Akreditasi Customs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PengajuanAkreditasiCustom', 'url'=>array('index')),
	array('label'=>'Manage PengajuanAkreditasiCustom', 'url'=>array('admin')),
);
?>

<h1>Create PengajuanAkreditasiCustom</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>