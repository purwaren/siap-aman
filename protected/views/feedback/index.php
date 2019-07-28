<?php
/* @var $this FeedbackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Feedback Customs',
);

$this->menu=array(
	array('label'=>'Create FeedbackCustom', 'url'=>array('create')),
	array('label'=>'Manage FeedbackCustom', 'url'=>array('admin')),
);
?>

<h1>Feedback Customs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
