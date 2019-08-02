<?php
/* @var $this Controller */
/* @var $model Users */

$this->pageTitle = 'Kelola Pendamping Akreditasi';
$this->breadcrumbs = array(
    'Pendamping'
);
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar pengguna yang tercatat di dalam sistem</small></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'users-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'nama',
                    array(
                        'name'=>'tipe',
                        'value'=>'$data->getTipe()'
                    ),
                    array(
                        'name'=>'email',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view} {delete}',
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
        <div class="box-footer">
            <?php echo CHtml::link('Tambah Pendamping',array('pendamping/create'),array('class'=>'btn btn-primary'))?>
            <?php echo CHtml::link('Tambah Pendamping Non Sudin',array('pendamping/create','type'=>'nosudin'),array('class'=>'btn btn-warning'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->