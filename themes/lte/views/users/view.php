<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle = 'Detil Pengguna';

$this->breadcrumbs=array(
	'Pengguna'=>array('admin'),
	$model->name,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi lengkap tentang pengguna</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-lg-6">
			<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
							'id',
							'name',
							'username',
							'email',
							'status',
							'flag_delete',
							'login_atemp',
							'last_login_attempt',
							'last_login_time',
							'timestamp_created',
							'timestamp_updated',
							'user_create',
							'user_update',
					),
					'htmlOptions'=>array(
						'class'=>'table table-hover table-striped'
					),
			)); ?>
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('users/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



