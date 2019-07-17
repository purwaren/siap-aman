<?php
/* @var $this KlinikController */
/* @var $model Klinik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'klinik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_klinik'); ?>
		<?php echo $form->textField($model,'kode_klinik',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'kode_klinik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_izin'); ?>
		<?php echo $form->textField($model,'no_izin',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'no_izin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kepemilikan'); ?>
		<?php echo $form->textField($model,'kepemilikan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'kepemilikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penanggung_jawab'); ?>
		<?php echo $form->textField($model,'penanggung_jawab',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'penanggung_jawab'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'karakteristik'); ?>
		<?php echo $form->textField($model,'karakteristik',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'karakteristik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tingkatan'); ?>
		<?php echo $form->textField($model,'tingkatan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'tingkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->