<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag_delete'); ?>
		<?php echo $form->textField($model,'flag_delete'); ?>
		<?php echo $form->error($model,'flag_delete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_atemp'); ?>
		<?php echo $form->textField($model,'login_atemp'); ?>
		<?php echo $form->error($model,'login_atemp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login_attempt'); ?>
		<?php echo $form->textField($model,'last_login_attempt'); ?>
		<?php echo $form->error($model,'last_login_attempt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login_time'); ?>
		<?php echo $form->textField($model,'last_login_time'); ?>
		<?php echo $form->error($model,'last_login_time'); ?>
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