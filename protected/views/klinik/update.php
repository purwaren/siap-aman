<?php
/* @var $this KlinikController */
/* @var $model Klinik */

$this->breadcrumbs=array(
	'Kliniks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Klinik', 'url'=>array('index')),
	array('label'=>'Create Klinik', 'url'=>array('create')),
	array('label'=>'View Klinik', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Klinik', 'url'=>array('admin')),
);
?>

<h1>Update Klinik <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>