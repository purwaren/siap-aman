<?php
/* @var $this UsersController */
/* @var $model SudinCustom */
$this->pageTitle = 'Detil Suku Dinas';

$this->breadcrumbs=array(
	'Suku Dinas'=>array('admin'),
	$model->nama,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi lengkap tentang suku dinas</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-lg-12">
			<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
                    'attributes'=>array(
                        'id',
                        'nama',
                        'alamat',
                        'no_telp',
                        'no_fax',
                        'email',
                        'website',
                        'jumlah_klinik',
                        'created_at',
                        'created_by',
                        'updated_at',
                        'updated_by',
                    ),
					'htmlOptions'=>array(
						'class'=>'table table-hover table-striped'
					),
			)); ?>
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('sudin/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



