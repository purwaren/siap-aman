<?php
/* @var $this FeedbackController */
/* @var $model FeedbackCustom */

$this->breadcrumbs=array(
	'Feedback Customs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeedbackCustom', 'url'=>array('index')),
	array('label'=>'Create FeedbackCustom', 'url'=>array('create')),
	array('label'=>'View FeedbackCustom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FeedbackCustom', 'url'=>array('admin')),
);
?>

<h1>Update FeedbackCustom <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>