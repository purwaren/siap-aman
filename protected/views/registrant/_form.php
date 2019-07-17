<?php
/* @var $this RegistrantController */
/* @var $model Registrant */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registrant-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_place'); ?>
		<?php echo $form->textField($model,'birth_place',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'birth_place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
		<?php echo $form->error($model,'birth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fathers_name'); ?>
		<?php echo $form->textField($model,'fathers_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'fathers_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mothers_name'); ?>
		<?php echo $form->textField($model,'mothers_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'mothers_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school_origin'); ?>
		<?php echo $form->textField($model,'school_origin',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'school_origin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graduated_year'); ?>
		<?php echo $form->textField($model,'graduated_year'); ?>
		<?php echo $form->error($model,'graduated_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ijazah_number'); ?>
		<?php echo $form->textField($model,'ijazah_number',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'ijazah_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'selected_edu_level'); ?>
		<?php echo $form->textField($model,'selected_edu_level',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'selected_edu_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag_dokumen'); ?>
		<?php echo $form->textField($model,'flag_dokumen'); ?>
		<?php echo $form->error($model,'flag_dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->