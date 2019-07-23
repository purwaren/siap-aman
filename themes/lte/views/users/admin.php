<?php
/* @var $this Controller */
/* @var $model Users */

$this->pageTitle = 'Manajemen Pengguna';
$this->breadcrumbs = array(
    'Manajemen Pengguna'
);
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar pengguna yang tercatat di dalam sistem</small></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
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
                    array(
                        'name'=>'name',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    'username',
                    array(
                        'name'=>'email',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    'status',
                    array(
                        'name'=>'timestamp_created',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
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
                            )
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{items}{summary}'
            )); ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <?php echo CHtml::link('Tambah Pengguna',array('users/create'),array('class'=>'btn btn-primary'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->