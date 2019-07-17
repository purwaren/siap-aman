<?php
/* @var $this AlbumController */
/* @var $model GalleryUpload */
/* @var $form CActiveForm */
/* @var $album Album */

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
Yii::app()->clientScript->registerScript('imageUpload',"
	$('.imageUpload').fileinput({
		showCaption: false,
		uploadUrl: '".Yii::app()->createUrl('album/upload',array('id'=>$album->id))."',
		error: 'Tidak boleh lebih dari 5 file sekaligus',
		maxFileCount: 5,
		validateInitialCount: true,
		allowedFileExtensions: ['jpg', 'png', 'gif']
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
			<div class="form-group">
				<?php echo $form->labelEx($model,'files'); ?>
				<input type="file" multiple class="file-loading imageUpload" name="files"/>
			</div>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo CHtml::submitButton('Selesai',array('class'=>'btn btn-success','href'=>Yii::app()->createUrl('album/view',array('id'=>$model->albumId)))); ?>
			&nbsp;
		</div>
	<?php $this->endWidget(); ?>
</div>


