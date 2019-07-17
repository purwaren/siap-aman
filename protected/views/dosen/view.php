<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dosen', 'url'=>array('index')),
	array('label'=>'Create Dosen', 'url'=>array('create')),
	array('label'=>'Update Dosen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dosen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>View Dosen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nidn',
		'nip',
		'nama',
		'tempat_lahir',
		'tanggal',
		'jenis_kelamin',
		'kewarganegaraan',
		'agama',
		'nik',
		'alamat',
		'kabupaten',
		'nama_ayah',
		'nama_ibu',
		'status_pegawai',
		'status_ikatan_kerja',
		'no_sk_pengangkatan',
		'tgl_sk_pengangkatan',
		'tgl_masuk',
	),
)); ?>
