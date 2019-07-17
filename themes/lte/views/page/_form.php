<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScript('util',"
	$('#title').keyup(function(){
		var temp = $(this).val();
		temp = temp.replaceAll(' ','-').toLowerCase();
		$('#permalink').val(temp);
	});
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.replace(new RegExp(search, 'g'), replacement);
	};
");
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
				<?php echo $form->labelEx($model,'title'); ?>
				<?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Judul halaman','id'=>'title')); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'permalink'); ?>
				<?php echo $form->textField($model,'permalink',array('class'=>'form-control','placeholder'=>'Permalink','id'=>'permalink')); ?>
				<?php echo $form->error($model,'permalink'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'content'); ?>
				<?php $this->widget('ext.redactor.ERedactorWidget',array(
					'model'=>$model,
					'attribute'=>'content',
					'options'=>array(
						'lang'=>'id',
						'imageUpload'=>Yii::app()->createUrl('page/upload',array('type'=>'image'))
					)
				))?>
				<?php echo $form->error($model,'content'); ?>
			</div>
			<?php if(Yii::app()->user->checkAccess('admin')) { ?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'flag_published'); ?>
				<?php echo $form->dropDownList($model,'flag_published',PageForm::getAllFlagPublishedOptions(),array('class'=>'form-control','placeholder'=>'Judul halaman')); ?>
				<?php echo $form->error($model,'flag_published'); ?>
			</div>
			<?php } ?>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
			&nbsp;
			<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('page/admin'))); ?>
		</div>
	<?php $this->endWidget(); ?>
</div>


