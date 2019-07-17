<?php
/* @var $this AuthitemController */
/* @var $model Authitem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authitem-form',
	'enableAjaxValidation'=>false,
));

$this->widget( 'ext.EChosen.EChosen' );

Yii::app()->clientScript->registerScript("ajx-form","
$('#type').change(function(){
	var type = $('#type').val();
	".CHtml::ajax(
	array(
		'url'=>Yii::app()->createUrl('authitem/create'),
		'data'=>array('type'=>'js:type'),
		'type'=>'POST',
		'success'=>"function(resp){
			$('#item-name').html(resp);
			$('.chzn-select').chosen();
		}"
	)
)."
})
"); 
?>

	<p class="note">Isian bertanda <span class="required">*</span>tidak boleh dikosongkan.</p>

	<?php echo $form->errorSummary($model); ?>
	<table>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'type'); ?></td>
			<td class="value-column"><?php echo $form->dropDownList($model,'type',Authitem::getAllTypeOptions(),
			array('prompt'=>'Pilih Tipe','id'=>'type','class'=>'normal-text')); ?></td>
		</tr>
		<?php if($model->isNewRecord) {?>		
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'name'); ?></td>
			<td class="value-column" id="item-name"><?php echo $form->dropDownList($model,'name',AllController::getAllOptions(),
			array('prompt'=>'Pilih Akses','class'=>'chzn-select normal-text')); ?></td>
		</tr>
		<?php } else { 
		if($model->type==CAuthItem::TYPE_ROLE)
		{?>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'name'); ?></td>
			<td class="value-column" id="item-name"><?php echo $form->textField($model,'name',
					array('class'=>'normal-text','readonly'=>'true')); ?></td>
		</tr>
		<?php } else {?>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'name'); ?></td>
			<td class="value-column" id="item-name"><?php echo $form->dropDownList($model,'name',AllController::getAllOptions(),
			array('prompt'=>'Pilih Akses','class'=>'chzn-select normal-text')); ?></td>
		</tr>
		<?php }}?>		
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'description'); ?></td>
			<td class="value-column"><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>512)); ?></td>
		</tr>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'bizrule'); ?></td>
			<td class="value-column"><?php echo $form->textField($model,'bizrule',array('size'=>60,'maxlength'=>512)); ?></td>
		</tr>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'data'); ?></td>
			<td class="value-column"><?php echo $form->textField($model,'data',array('size'=>60,'maxlength'=>512)); ?></td>
		</tr>
	</table>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->