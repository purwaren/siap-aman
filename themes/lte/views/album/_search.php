
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('role'=>'form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Nama album')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',Album::getAllTypeOptions(),array('class'=>'form-control','prompt'=>'Pilih Kategori')); ?>
	</div>

	<div class="box-footer">
		<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-default')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
