<?php
/* @var $this RegistrantController */
/* @var $model Registrant */

$this->breadcrumbs=array(
	'Registrants'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Registrant', 'url'=>array('index')),
	array('label'=>'Create Registrant', 'url'=>array('create')),
	array('label'=>'Update Registrant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Registrant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registrant', 'url'=>array('admin')),
);
?>

<h1>View Registrant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'firstname',
		'lastname',
		'nickname',
		'gender',
		'birth_place',
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
	),
)); ?>
