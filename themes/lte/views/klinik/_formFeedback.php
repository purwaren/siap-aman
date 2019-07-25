<?php
/* @var $this KlinikController */
/* @var $form CActiveForm */
/* @var $model FeedbackForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'feedback-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
));
?>
    <div class="col-lg-12">
        <div class="form-group">
            <?php echo $form->labelEx($model,'status_pengajuan'); ?>
            <?php echo $form->dropDownList($model,'status_pengajuan',StatusPengajuan::getStatusPengajuanForFeedback(),
                array('class'=>'form-control','prompt'=>'Pilih Status')); ?>
            <?php echo $form->error($model,'status_pengajuan'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model,'message'); ?>
            <?php echo $form->textArea($model,'message',array('class'=>'form-control','style'=>'min-height: 120px')); ?>
            <?php echo $form->error($model,'message'); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('Kirim', array('class'=>'btn btn-primary'))?>
        </div>
    </div>



<?php $this->endWidget(); ?>