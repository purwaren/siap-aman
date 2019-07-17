<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Event'=>array('Admin'),
	'detail',
);
$this->pageTitle = $model->title;
?>

<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><small>Detail Event</small></h3>
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
					'title',
					array(
						'name'=>'description',
						'type'=>'html'
					),
					'location',
					array(
						'name'=>'start_date',
						'type'=>'date'
					),
					array(
						'name'=>'end_date',
						'type'=>'date'
					),
					'user_create',
					'user_update',
					'timestamp_create',
					'timestamp_update',
				),
				'htmlOptions'=>array(
					'class'=>'table table-hover table-striped table-detail-view'
				),
			)); ?>
			</div>
		</div>
		<div class="box-footer">
			<?php echo CHtml::link('Kembali', array('event/admin'), array('class'=>'btn btn-primary'))?>
		</div>
	</div>

</section>
