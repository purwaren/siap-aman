<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle = 'Detil Pendaftar';

$this->breadcrumbs=array(
	'Pendaftar'=>array('admin'),
	$model->firstname,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi lengkap tentang pendaftar</small></h3>
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
							'reg_number',
							'firstname',
							'lastname',
							'nickname',
							array(
								'name'=>'gender',
								'value'=>$model->getGender(),
							),
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
							array(
								'label'=>'Status Pendaftaran',
								'value'=>$model->getStatusPendaftaran(),
								'type'=>'html'
							)
						),
						'htmlOptions'=>array(
							'class'=>'table table-hover table-striped'
						),
				)); ?>
				</div>
				<div class="col-md-6">
					<div class="profile-pict">
					<?php echo CHtml::image($photo,'Pas Foto')?>
					</div>
					<?php $this->widget('zii.widgets.grid.CGridView',array(
						'id'=>'users-grid',
						'dataProvider'=>$documents->search(),
						'summaryText'=>'Dokumen yang telah dipload',
						'columns'=>array(
							array(
								'header'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
							),
							'name',
							'timestamp_created',
							array(
								'class'=>'CButtonColumn',
								'template'=>'{viw} {down}',
								'buttons'=>array(
									'viw'=>array(
										'label'=>'<i class="fa fa-search"></i>',
										'url'=>'Yii::app()->createUrl("registrant/document",array("id"=>$data->id))',
										'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Lihat Detil')
									),
									'down'=>array(
										'label'=>'<i class="fa fa-download"></i>',
										'url'=>'Yii::app()->createUrl("registrant/download",array("id"=>$data->id))',
										'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Download Dokumen')
									),
								)
							),
						),
						'itemsCssClass'=>'table table-bordered table-hover dataTable'
					))?>
				</div>
			</div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('registrant/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



