<?php
/* @var $this AkreditasiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengajuan Akreditasi Customs',
);

$this->menu=array(
	array('label'=>'Create PengajuanAkreditasiCustom', 'url'=>array('create')),
	array('label'=>'Manage PengajuanAkreditasiCustom', 'url'=>array('admin')),
);
?>

<h1>Pengajuan Akreditasi Customs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
