<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Hak Akses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Pendaftaran Akses', 'url'=>array('create')),	
	array('label'=>'Pengaturan Akses', 'url'=>array('admin')),
);
?>

<h1>Ubah Akses : <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>