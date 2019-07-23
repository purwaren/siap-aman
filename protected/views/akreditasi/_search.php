<?php
/* @var $this AkreditasiController */
/* @var $model PengajuanAkreditasiCustom */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_klinik'); ?>
		<?php echo $form->textField($model,'id_klinik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_urut'); ?>
		<?php echo $form->textField($model,'no_urut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_pengajuan'); ?>
		<?php echo $form->textField($model,'tgl_pengajuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_pengajuan'); ?>
		<?php echo $form->textField($model,'jenis_pengajuan',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_penetapan'); ?>
		<?php echo $form->textField($model,'tgl_penetapan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->