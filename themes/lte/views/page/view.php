<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle = 'Pratinjau Halaman';

$this->breadcrumbs=array(
	'Halaman Statis'=>array('admin'),
	$model->title,
);
Yii::app()->clientScript->registerScript('img',"
    $('.content img').attr('class','img-responsive');
");
?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo CHtml::encode($model->title); ?><small class="hidden-xs"> ditulis oleh <strong><?php echo $model->user_create; ?></strong></small></h3>
			<div class="box-tools pull-right hidden-xs">
				<span class="time"><i class="fa fa-calendar"></i> <?php echo $model->timestamp_created; ?></span>
			</div>
			<div class="hidden-sm hidden-md hidden-lg">
				<small>Ditulis oleh <strong><?php echo $model->user_create; ?></strong> |  <?php echo $model->timestamp_created; ?></span></small>
			</div>
		</div>
		<div class="box-body">
			<?php echo $model->content; ?>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('page/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



