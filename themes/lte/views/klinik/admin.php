<?php
/* @var $this Controller */
/* @var $model Klinik */

$this->pageTitle = 'Kelola Data Kinik';
$this->breadcrumbs = array(
    'Klinik'
);

Yii::app()->clientScript->registerScript('search', "
$('#search-form').submit(function(){
	$('#klinik-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title"><a href="#" data-widget="collapse">Advance Search</a></h3>
        </div>
        <?php $this->renderPartial('_search',array('model'=>$model))?>
    </div>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar klinik yang tercatat di dalam sistem</small></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'klinik-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'nama',
                    array(
                        'header'=>'Kota',
                        'value'=>'$data->getRegency()'
                    ),
                    'penanggung_jawab',
                    array(
                        'name'=>'tingkatan',
                        'value'=>'$data->getTingkatan()'
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Detail','data-toggle'=>'tooltip')
                            ),
                            'update'=>array(
                                'label'=>'<i class="fa fa-edit"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-warning','title'=>'Ubah','data-toggle'=>'tooltip')
                            ),
                            'delete'=>array(
                                'label'=>'<i class="fa fa-trash"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-danger','title'=>'Hapus','data-toggle'=>'tooltip'),
                                'visible'=>'Yii::app()->user->isAdmin()'
                            )
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{summary}{items}{pager}',
                'pagerCssClass'=>'dataTables_paginate paging_simple_numbers text-center',
                'pager'=>array(
                    'htmlOptions'=>array('class'=>'pagination'),
                    'internalPageCssClass'=>'paginate_button',
                    'selectedPageCssClass'=>'active',
                    'header'=>''
                )
            )); ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->