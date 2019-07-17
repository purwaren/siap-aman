<?php
/* @var $this RegistrantController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registrants',
);

$this->menu=array(
	array('label'=>'Create Registrant', 'url'=>array('create')),
	array('label'=>'Manage Registrant', 'url'=>array('admin')),
);
?>

<h1>Registrants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
