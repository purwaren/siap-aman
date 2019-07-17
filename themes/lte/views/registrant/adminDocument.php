<?php
/* @var $this Controller */
$this->pageTitle = 'Pendaftar';
$this->breadcrumbs = array(
    'Pendaftar'
);
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar dokumen yang tersimpan di dalam sistem</small></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'docs-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'Registrant.reg_number',
                    'Registrant.firstname',
                    'name',
                    'timestamp_created',
                    'user_create',

                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{viw}',
                        'buttons'=>array(
                            'viw'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'url'=>'Yii::app()->createUrl("registrant/document",array("id"=>$data->id))',
                                'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Lihat Detil')
                            ),
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-bordered table-hover dataTable'
            )); ?>
        </div><!-- /.box-body -->

    </div><!-- /.box -->
</section><!-- /.content -->