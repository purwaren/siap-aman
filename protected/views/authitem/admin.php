<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Hak Akses'=>array('index'),
	'Pengaturan Akses',
);

$this->menu=array(
	array('label'=>'Pengaturan Peran', 'url'=>array('index')),
	array('label'=>'Kelola Pengguna', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#authitem-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php if($type == CAuthItem::TYPE_OPERATION) { ?>
<h1>Pengaturan Akses</h1>
<?php } else {?>
<h1>Pengaturan Peran</h1>
<?php }?>
<p>
Anda bisa menggunakan operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
atau <b>=</b>) untuk  menyesuaikan perbandingan dalam kata kunci pencarian.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'authitem-grid',
	'dataProvider'=>$model->search(),	
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
		),
		'description',
		array(
			'name'=>'type',
			'value'=>'$data->getType()'
		),
		'name',
		'bizrule',
		'data',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{config}&nbsp;{update}&nbsp;{delete}',
			'buttons'=>array(
				'config'=>array(
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/config.jpg',
					'label'=>'Konfigurasi',
					'url'=>'Yii::app()->createUrl("authitem/role",array("id"=>$data->id))',
					'visible'=>'($data->type==CAuthItem::TYPE_ROLE)'
				)
			),
			'htmlOptions'=>array(
				'style'=>'width:80px; text-align:center;'
			)
		),
	),
)); ?>

