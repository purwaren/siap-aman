<?php
/* @var $this AkreditasiController */
/* @var $model PengajuanAkreditasiCustom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengajuan-akreditasi-custom-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_klinik'); ?>
		<?php echo $form->textField($model,'id_klinik'); ?>
		<?php echo $form->error($model,'id_klinik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_urut'); ?>
		<?php echo $form->textField($model,'no_urut'); ?>
		<?php echo $form->error($model,'no_urut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_pengajuan'); ?>
		<?php echo $form->textField($model,'tgl_pengajuan'); ?>
		<?php echo $form->error($model,'tgl_pengajuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_pengajuan'); ?>
		<?php echo $form->textField($model,'jenis_pengajuan',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'jenis_pengajuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_penetapan'); ?>
		<?php echo $form->textField($model,'tgl_penetapan'); ?>
		<?php echo $form->error($model,'tgl_penetapan'); ?>
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