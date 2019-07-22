<?php
/* @var $this SudinController */
/* @var $model SudinForm */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/select2/select2.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/select2/select2-bootstrap.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/select2/select2.full.min.js');
Yii::app()->clientScript->registerScript('form', "
    $('.select2').select2();
    ", CClientScript::POS_END);

?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sudin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));
?>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><small>Isian bertanda * tidak boleh dikosongkan</small></h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="col-lg-12">
            <div class="form-group">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'tipe'); ?>
                <?php echo $form->dropDownList($model,'tipe',TipePendamping::getAllTipeOptions(),
                    array('class'=>'form-control','prompt'=>'Pilih Jenis Pendamping')); ?>
                <?php echo $form->error($model,'tipe'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'id_sudin'); ?>
                <?php echo $form->dropDownList($model,'id_sudin', SudinCustom::getAllSudinOptions(),
                    array('class'=>'form-control','prompt'=>'Pilih Suku Dinas')); ?>
                <?php echo $form->error($model,'id_sudin'); ?>
            </div>
        </div>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
		&nbsp;
		<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('pendamping/admin'))); ?>
	</div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
