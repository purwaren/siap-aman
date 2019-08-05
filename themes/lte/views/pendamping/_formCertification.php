<?php
/* @var $this PendampingController */
/* @var $model ProfilePendampingForm */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/bootstrap-datepicker.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/datepicker3.css');

Yii::app()->clientScript->registerScript('datepicker',"
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    
    $('#certificate-form').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        ".CHtml::ajax(array(
            'url'=>Yii::app()->createUrl('pendamping/certification', array('do'=>'create')),
            'data'=>'js:formData',
            'type'=>'POST',
            'success'=>"function(resp){
                $('#certification-grid').yiiGridView('update');
            }"
        ))."
    });
    
",CClientScript::POS_END);


?>
<div class="col-lg-12">
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'certificate-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
    <?php if ($success=Yii::app()->user->getFlash('success')) {?>
        <div class="alert alert-success">
            <?php echo $success ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="form-group">
                <?php echo $form->textField($model,'no_sertifikat',array('class'=>'form-control','placeholder'=>'Nomor Sertifikat')); ?>
                <?php echo $form->error($model,'no_sertifikat'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($model,'nama',array('class'=>'form-control','placeholder'=>'Nama Sertifikat')); ?>
                <?php echo $form->error($model,'nama'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($model,'bidang_peminatan',array('class'=>'form-control','placeholder'=>'Bidang Peminatan')); ?>
                <?php echo $form->error($model,'bidang_peminatan'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($model,'penyelenggara',array('class'=>'form-control','placeholder'=>'Penyelenggara')); ?>
                <?php echo $form->error($model,'penyelenggara'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($model,'tgl_perolehan',array('class'=>'form-control datepicker','placeholder'=>'Tanggal Perolehan')); ?>
                <?php echo $form->error($model,'tgl_perolehan'); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'certification-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'nama',
                    'penyelenggara',
                    'tgl_perolehan',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{delete}',
                        'buttons'=>array(
                            'delete'=>array(
                                'label'=>'<i class="fa fa-trash"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-danger','title'=>'Hapus','data-toggle'=>'tooltip'),
                                'url'=>'Yii::app()->createUrl("pendamping/certification",array("id"=>$data->id,"do"=>"delete"))'
                            )
                        )
                    ),
                ),
                'htmlOptions' => array(
                    'class' => 'table table-striped'
                ),
                'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
                'itemsCssClass' => 'table table-striped table-hover',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{items}'
            )); ?>
        </div>
    </div>
</div>

