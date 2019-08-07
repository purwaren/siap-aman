<?php
/* @var $this PendampingController */
/* @var $model ProfilePendampingForm */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('form-education-post',"
    $('#education-form').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        ".CHtml::ajax(array(
            'url'=>Yii::app()->createUrl('pendamping/education', array('do'=>'create')),
            'data'=>'js:formData',
            'type'=>'POST',
            'success'=>"function(resp){
                $('#edu-reset-btn').click();
                $('#education-grid').yiiGridView('update');
            }"
        ))."
    });
",CClientScript::POS_END);

?>
<div class="col-lg-12">
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'education-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        ));?>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="form-group">
                <?php echo $form->textField($model,'nama_institusi',array('class'=>'form-control','placeholder'=>'Nama Institusi')); ?>
                <?php echo $form->error($model,'nama_institusi'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->dropDownList($model,'tingkat',
                    RiwayatPendidikanCustom::getAllTingkatOptions(),
                    array('class'=>'form-control','prompt'=>'Pilih Tingkat Pendidikan')); ?>
                <?php echo $form->error($model,'tingkat'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->textField($model,'tahun_lulus',array('class'=>'form-control','placeholder'=>'Tahun Lulus')); ?>
                <?php echo $form->error($model,'tahun_lulus'); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
                <?php echo CHtml::resetButton('Reset',array('class'=>'hidden','id'=>'edu-reset-btn')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'education-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    'nama_institusi',
                    'tingkat',
                    'tahun_lulus',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{delete}',
                        'buttons'=>array(
                            'delete'=>array(
                                'label'=>'<i class="fa fa-trash"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-danger','title'=>'Hapus','data-toggle'=>'tooltip'),
                                'url'=>'Yii::app()->createUrl("pendamping/education",array("id"=>$data->id,"do"=>"delete"))'
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


