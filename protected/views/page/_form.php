<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'permalink'); ?>
		<?php echo $form->textField($model,'permalink',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'permalink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag_published'); ?>
		<?php echo $form->textField($model,'flag_published'); ?>
		<?php echo $form->error($model,'flag_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timestamp_created'); ?>
		<?php echo $form->textField($model,'timestamp_created'); ?>
		<?php echo $form->error($model,'timestamp_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timestamp_updated'); ?>
		<?php echo $form->textField($model,'timestamp_updated'); ?>
		<?php echo $form->error($model,'timestamp_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_create'); ?>
		<?php echo $form->textField($model,'user_create',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'user_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_update'); ?>
		<?php echo $form->textField($model,'user_update',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'user_update'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->