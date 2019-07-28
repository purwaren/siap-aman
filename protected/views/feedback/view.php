<?php
/* @var $this FeedbackController */
/* @var $model FeedbackCustom */

$this->breadcrumbs=array(
	'Feedback Customs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FeedbackCustom', 'url'=>array('index')),
	array('label'=>'Create FeedbackCustom', 'url'=>array('create')),
	array('label'=>'Update FeedbackCustom', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FeedbackCustom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeedbackCustom', 'url'=>array('admin')),
);
?>

<h1>View FeedbackCustom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'from',
		'to',
		'id_pengajuan',
		'message',
		'flag_read',
		'created_by',
		'created_at',
	),
)); ?>
