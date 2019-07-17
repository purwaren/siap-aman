<?php
/* @var $this Controller */
/* @var $model Klinik */

$this->pageTitle = 'Kelola Data Kinik';
$this->breadcrumbs = array(
    'Klinik'
);
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar klinik yang tercatat di dalam sistem</small></h3>
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
                    'kode',
                    'nama',
                    'kepemilikan',
                    'penanggung_jawab',
                    'tingkatan',
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
            <?php echo CHtml::link('Registrasi Klinik',array('klinik/create'),array('class'=>'btn btn-primary'))?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->