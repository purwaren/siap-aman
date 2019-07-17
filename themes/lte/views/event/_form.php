<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
//Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/bootstrap-datepicker.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/daterangepicker/moment.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker.js');
//Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/datepicker3.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/daterangepicker/daterangepicker-bs3.css');
Yii::app()->clientScript->registerScript("datepicker","
	$('.date-picker').daterangepicker({
	    timePicker: true,
	    timePickerIncrement: 30, 
	    format: 'YYYY/MM/DD HH:mm:ss'
	});
");
Yii::app()->clientScript->registerCss('datepickercss',"
	.datepicker{
		z-index: 1222 !important;
	}
");
?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><small>Isian bertanda * tidak boleh dikosongkan</small></h3>
	</div><!-- /.box-header -->

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'event-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="box-body">
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'title'); ?>
				<?php echo $form->textField($model,'title',array('class'=>'form-control','maxlength'=>128)); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'description'); ?>
				<?php $this->widget('ext.redactor.ERedactorWidget',array(
					'model'=>$model,
					'attribute'=>'description',
					'options'=>array(
						'lang'=>'id',
						'imageUpload'=>Yii::app()->createUrl('event/upload',array('type'=>'image'))
					)
				))?>
				<?php echo $form->error($model,'description'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'location'); ?>
				<?php echo $form->textField($model,'location',array('class'=>'form-control','maxlength'=>128)); ?>
				<?php echo $form->error($model,'location'); ?>
			</div>

			<div class="form-group">
                <?php echo $form->labelEx($model,'datetime'); ?>
				<?php echo $form->textField($model,'datetime', array('class'=>'form-control date-picker')); ?>
				<?php echo $form->error($model,'datetime'); ?>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<div class="col-lg-6">
			<div class="form-group">
				<?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->