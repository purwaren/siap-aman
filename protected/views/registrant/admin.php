<?php
/* @var $this RegistrantController */
/* @var $model Registrant */

$this->breadcrumbs=array(
	'Registrants'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Registrant', 'url'=>array('index')),
	array('label'=>'Create Registrant', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registrant-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Registrants</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registrant-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'firstname',
		'lastname',
		'nickname',
		'gender',
		'birth_place',
		/*
		'birth_date',
		'address',
		'phone',
		'email',
		'nationality',
		'fathers_name',
		'mothers_name',
		'school_origin',
		'graduated_year',
		'ijazah_number',
		'selected_edu_level',
		'flag_dokumen',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
