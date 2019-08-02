<?php
/* @var $this PendampingController */
/* @var $model ProfilePendampingForm */
/* @var $form CActiveForm */

$form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));

?>
<?php if ($success=Yii::app()->user->getFlash('success')) {?>
    <div class="alert alert-success">
        <?php echo $success ?>
    </div>
<?php } ?>
<div class="col-lg-6 col-xs-12">
    <div class="form-group">
        <?php echo $form->labelEx($model,'gelar_depan'); ?>
        <?php echo $form->textField($model,'gelar_depan',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'gelar_depan'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'nama'); ?>
        <?php echo $form->textField($model,'nama',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'nama'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'gelar_belakang'); ?>
        <?php echo $form->textField($model,'gelar_belakang',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'gelar_belakang'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'tempat_lahir'); ?>
        <?php echo $form->textField($model,'tempat_lahir',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'tempat_lahir'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'tgl_lahir'); ?>
        <?php echo $form->textField($model,'tgl_lahir',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'tgl_lahir'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'jabatan'); ?>
        <?php echo $form->textField($model,'jabatan',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'jabatan'); ?>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
