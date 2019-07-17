
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('role'=>'form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Judul berita')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',Category::getAllCategoryOptions(),array('class'=>'form-control','placeholder'=>'Judul halaman','prompt'=>'Pilih Kategori')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'flag_published'); ?>
		<?php echo $form->dropDownList($model,'flag_published',NewsForm::getAllFlagPublishedOptions(),array('class'=>'form-control','prompt'=>'Pilih Status Publikasi')); ?>
	</div>

	<div class="box-footer">
		<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-default')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
