<?php
/* @var $this UsersController */
/* @var $model Users */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flag_delete'); ?>
		<?php echo $form->textField($model,'flag_delete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'login_atemp'); ?>
		<?php echo $form->textField($model,'login_atemp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login_attempt'); ?>
		<?php echo $form->textField($model,'last_login_attempt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login_time'); ?>
		<?php echo $form->textField($model,'last_login_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timestamp_created'); ?>
		<?php echo $form->textField($model,'timestamp_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timestamp_updated'); ?>
		<?php echo $form->textField($model,'timestamp_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_create'); ?>
		<?php echo $form->textField($model,'user_create',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_update'); ?>
		<?php echo $form->textField($model,'user_update',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->