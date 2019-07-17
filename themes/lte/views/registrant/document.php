<?php
/* @var $this RegistrantController */
/* @var $model RegistrantDocument */
$this->pageTitle = 'Detil Dokumen';

$this->breadcrumbs=array(
	'Pendaftar'=>array('admin'),
	'Detil'=>array('view','id'=>$model->Registrant->id),
	'Dokumen'
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi lengkap tentang dokumen</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
				<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'attributes'=>array(
							'name',
							'timestamp_create',
							'user_create',
							'timestamp_update',
							'user_update'
						),
						'htmlOptions'=>array(
							'class'=>'table table-hover table-striped'
						),
				)); ?>
				</div>
				<div class="col-md-6">
					<div class="profile-pict">
					<?php echo CHtml::image($model->path,'Preview Document')?>
					</div>

				</div>
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',Yii::app()->request->urlReferrer,array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



