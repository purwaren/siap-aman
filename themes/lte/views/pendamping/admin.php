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
                    'tipe',
                    array(
                        'name'=>'email',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    'jabatan',
                    'no_hp',
                    array(
                        'class'=>'CButtonColumn',
                    ),
                ),
                'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{items}{summary}'
            )); ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <?php echo CHtml::link('Tambah Pendamping',array('pendamping/create'),array('class'=>'btn btn-primary'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->