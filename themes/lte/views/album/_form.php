<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>



<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><small>Isian bertanda * tidak boleh dikosongkan</small></h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'page-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('role'=>'form')
	)); ?>
		<div class="box-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Nama kategori')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'description'); ?>
				<?php echo $form->textField($model,'description',array('class'=>'form-control','placeholder'=>'Keterangan')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'type'); ?>
				<?php echo $form->dropDownList($model,'type',Album::getAllTypeOptions(),
					array('class'=>'form-control','prompt'=>'Pilih tipe')); ?>
				<?php echo $form->error($model,'type'); ?>
			</div>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo CHtml::submitButton('Lanjut',array('class'=>'btn btn-success')); ?>
			&nbsp;
			<?php echo CHtml::linkButton('Batal',array('class'=>'btn btn-danger','href'=>array('album/admin'))); ?>
		</div>
	<?php $this->endWidget(); ?>
</div>


