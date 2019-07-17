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
            <h3 class="box-title"><small>Calon siswa yang sudah mendaftar</small></h3>
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
                        'name'=>'firstname',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    array(
                        'name'=>'lastname',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    'gender',
                    array(
                        'name'=>'email',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    'phone',
                    'selected_edu_level',
                    array(
                        'name'=>'timestamp_created',
                        'htmlOptions'=>array('class'=>'hidden-xs'),
                        'headerHtmlOptions'=>array('class'=>'hidden-xs'),
                    ),
                    array(
                        'header'=>'Status Pendaftaran',
                        'value'=>'$data->getStatusPendaftaran()',
                        'type'=>'raw'
                    ),

                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{viw} {ver} {pay}',
                        'buttons'=>array(
                            'viw'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'url'=>'Yii::app()->createUrl("registrant/view",array("id"=>$data->id))',
                                'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Lihat Detil')
                            ),
                            'ver'=>array(
                                'label'=>'<i class="fa fa-file"></i>',
                                'url'=>'Yii::app()->createUrl("registrant/verify",array("id"=>$data->id))',
                                'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Verifikasi Dokumen'),
                                'visible'=>'$data->flag_dokumen == Registrant::FLAG_DOCUMENT_UPLOADED'
                            ),
                            'pay'=>array(
                                'label'=>'<i class="fa fa-check"></i>',
                                'url'=>'Yii::app()->createUrl("registrant/validate",array("id"=>$data->id))',
                                'options'=>array('class'=>'btn btn-default btn-sm','title'=>'Validasi Pembayaran'),
                                'visible'=>'$data->status == Registrant::STATUS_VALIDATED',
                            )
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-bordered table-hover dataTable'
            )); ?>
        </div><!-- /.box-body -->

    </div><!-- /.box -->
</section><!-- /.content -->