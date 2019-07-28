<?php
/* @var $this FeedbackController */
/* @var $model FeedbackCustom */

$this->breadcrumbs=array(
	'Feedback Customs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeedbackCustom', 'url'=>array('index')),
	array('label'=>'Manage FeedbackCustom', 'url'=>array('admin')),
);
?>

<h1>Create FeedbackCustom</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>