<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle = 'Detil Dosen';

$this->breadcrumbs=array(
	'Dosen'=>array('admin'),
	$model->nama,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi lengkap tentang Dosen</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-12">
			<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
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
					'htmlOptions'=>array(
						'class'=>'table table-hover table-striped'
					),
			)); ?>
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('dosen/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



