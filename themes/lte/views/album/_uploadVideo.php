<?php
/* @var $this AlbumController */
/* @var $model GalleryUpload */
/* @var $form CActiveForm */
/* @var $album Album */
$clientScript = Yii::app()->clientScript;
$clientScript->registerScript('validateYoutube',"
	$('.youtubeUrl').change(function(){
		var url = $(this).val();
		if (url != undefined || url != '') {        
        var regExp = /^.*(youtube.com\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (!(match && match[2].length == 11)) {
            $(this).parent().children(':last-child').html('URL video tidak valid');
            $(this).val('');
        }
        else {
        	$(this).parent().children(':last-child').html('');
        }
    }
	});
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
			<div class="col-lg-4">
				<div class="form-group">
					<?php echo $form->labelEx($model,'files'); ?>
					<?php echo $form->textField($model, 'files[]', array('class'=>'form-control youtubeUrl'))?>
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'files[]', array('class'=>'form-control youtubeUrl'))?>
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'files[]', array('class'=>'form-control youtubeUrl'))?>
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'files[]', array('class'=>'form-control youtubeUrl'))?>
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'files[]', array('class'=>'form-control youtubeUrl'))?>
					<span class="text-danger"></span>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="form-group">
					<?php echo $form->labelEx($model,'captions'); ?>
					<?php echo $form->textField($model, 'captions[]', array('class'=>'form-control'))?>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'captions[]', array('class'=>'form-control'))?>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'captions[]', array('class'=>'form-control'))?>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'captions[]', array('class'=>'form-control'))?>
				</div>
				<div class="form-group">
					<?php echo $form->textField($model, 'captions[]', array('class'=>'form-control'))?>
				</div>
			</div>
		</div><!-- /.box-body -->

		<div class="box-footer">
			<div class="col-lg-6">
				<div class="form-group">
					<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
				</div>
			</div>
		</div>
	<?php $this->endWidget(); ?>
</div>


