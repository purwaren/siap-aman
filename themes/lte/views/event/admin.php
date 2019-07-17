<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('admin'),
);

$this->pageTitle = 'Kelola Event';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Daftar Event</small></h3>
		</div>
		<div class="box-body">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'event-grid',
				'dataProvider'=>$model->search(),
				'columns'=>array(
					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
					),
					'title',
					'location',
					'start_date',
					'end_date',

					array(
						'class'=>'CButtonColumn',
					),
				),
				'itemsCssClass'=>'table table-bordered table-hover dataTable'
			)); ?>
		</div>
        <div class="box-footer">
            <?php echo CHtml::link('Tambah Event',array('event/create'),array('class'=>'btn btn-primary'))?>
        </div><!-- /.box-footer-->
	</div>

</section>

