<?php
/* @var $this DosenController */
/* @var $model Dosen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dosen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nidn'); ?>
		<?php echo $form->textField($model,'nidn',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nidn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kewarganegaraan'); ?>
		<?php echo $form->textField($model,'kewarganegaraan',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'kewarganegaraan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agama'); ?>
		<?php echo $form->textField($model,'agama',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'agama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nik'); ?>
		<?php echo $form->textField($model,'nik',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kabupaten'); ?>
		<?php echo $form->textField($model,'kabupaten',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'kabupaten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_pegawai'); ?>
		<?php echo $form->textField($model,'status_pegawai',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'status_pegawai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_ikatan_kerja'); ?>
		<?php echo $form->textField($model,'status_ikatan_kerja',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'status_ikatan_kerja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_sk_pengangkatan'); ?>
		<?php echo $form->textField($model,'no_sk_pengangkatan',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'no_sk_pengangkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_sk_pengangkatan'); ?>
		<?php echo $form->textField($model,'tgl_sk_pengangkatan'); ?>
		<?php echo $form->error($model,'tgl_sk_pengangkatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_masuk'); ?>
		<?php echo $form->textField($model,'tgl_masuk'); ?>
		<?php echo $form->error($model,'tgl_masuk'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->