<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
if($model->isNewRecord)
	Yii::app()->clientScript->registerScript('upload',"
		$('#uploadFile').fileinput({
			showCaption: false,
			uploadUrl: '".Yii::app()->createUrl('news/upload',array('type'=>'banner'))."',
			uploadAsync: true,
			maxFileCount: 1
		});
	");
else
	Yii::app()->clientScript->registerScript('upload',"
		$('#uploadFile').fileinput({
			showCaption: false,
			uploadUrl: '".Yii::app()->createUrl('news/upload',array('type'=>'banner'))."',
			initialPreview: ['".CHtml::image($model->banner,$model->title,array('class'=>'file-preview-image'))."'],
			uploadAsync: true,
			maxFileCount: 1
		});
	");
Yii::app()->clientScript->registerScript('uploaded',"
	$('#uploadFile').on('fileuploaded', function(event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
		$('#banner').val(response.imageUrl);
	});
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
			'id'=>'news-form',
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
				<?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Judul berita','id'=>'title')); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'permalink'); ?>
				<?php echo $form->textField($model,'permalink',array('class'=>'form-control','placeholder'=>'Permalink','id'=>'permalink')); ?>
				<?php echo $form->error($model,'permalink'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'banner'); ?>
				<div class="input-group input-group-sm">
					<?php echo $form->hiddenField($model,'banner',array('class'=>'form-control','placeholder'=>'Banner / thumbnail berita','id'=>'banner')); ?>
					<span class="input-group-btn">
<!--						<button class="btn btn-info btn-flat" type="button" id="uploadButton">Upload</button>-->
						<input type="file" multiple class="file-loading" id="uploadFile"/>
					</span>
				</div>
				<?php echo $form->error($model,'banner'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'summary'); ?>
				<?php $this->widget('ext.redactor.ERedactorWidget',array(
						'model'=>$model,
						'attribute'=>'summary',
						'options'=>array(
								'lang'=>'id',
								'imageUpload'=>Yii::app()->createUrl('news/upload',array('type'=>'image'))
						)
				))?>
				<?php echo $form->error($model,'summary'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'content'); ?>
				<?php $this->widget('ext.redactor.ERedactorWidget',array(
					'model'=>$model,
					'attribute'=>'content',
					'options'=>array(
						'lang'=>'id',
						'imageUpload'=>Yii::app()->createUrl('news/upload',array('type'=>'image')),
						'fileUpload'=>Yii::app()->createUrl('news/upload',array('type'=>'file')),
					)
				))?>
				<?php echo $form->error($model,'content'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'cat_id'); ?>
				<?php echo $form->dropDownList($model,'cat_id',Category::getAllCategoryOptions(),array('class'=>'form-control','placeholder'=>'Judul halaman')); ?>
				<?php echo $form->error($model,'cat_id'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'tag'); ?>
				<?php $this->widget('ext.ETagger.ETagger',array(
					'model'=>$model,
					'attribute'=>'tag',
					'taggerWrapperClass'=>'tagger-input-container form-control',
					'autocompleteOptions'=>array(
						'source'=>Yii::app()->createUrl('news/listTag'),
						'delay'=>0,
						'close'=>"js:function(event, ui) {
							if(event.keyCode == 13)
								$(this).val('');
						}"
					),
				))?>
				<?php echo $form->error($model,'tag'); ?>
			</div>
			<?php if(Yii::app()->user->checkAccess('admin')) { ?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'flag_published'); ?>
				<?php echo $form->dropDownList($model,'flag_published',NewsForm::getAllFlagPublishedOptions(),array('class'=>'form-control','placeholder'=>'Judul halaman')); ?>
				<?php echo $form->error($model,'flag_published'); ?>
			</div>
			<?php } ?>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
			&nbsp;
			<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('news/admin'))); ?>
		</div>
	<?php $this->endWidget(); ?>
</div>


