<?php
/* @var $this Controller */
$this->pageTitle = 'Manajemen Akses';
$this->breadcrumbs = array(
    'Manajemen Akses'
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
                        'template'=>'{a}',
                        'buttons'=>array(
                            'a'=>array(
                                'label'=>'<i class="fa fa-plus"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-sm btn-primary','data-toggle'=>'tooltip', 'title'=>'Tambahkan Peran'),
                                'url'=>'Yii::app()->createUrl("authitem/assign",array("id"=>$data->id))'
                            )
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-bordered table-hover dataTable'
            )); ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <?php echo CHtml::link('Tambah Pengguna',array('users/create'),array('class'=>'btn btn-primary'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->