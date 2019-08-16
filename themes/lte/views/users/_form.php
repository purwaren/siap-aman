<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('reset-pass',"
    $('#btn-reset').click(function(event){
        event.preventDefault();
        if (!confirm('Anda yakin akan me-reset password user ini?'))
            return false;
        var url = '".Yii::app()->createUrl('users/reset',array('id'=>$model->id))."';
        ".CHtml::ajax(array(
            'url'=>'js:url',
            'type'=>'POST',
            'dataType'=>'JSON',
            'success'=>"function(resp){
                $('#success-msg').html(resp.msg);
                $('#success-msg').show();
            }"
        ))."
    });
",CClientScript::POS_END);

?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
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
        <div class="alert alert-success" id="success-msg" style="display: none">

        </div>
		<div class="col-lg-6 col-xs-12">
			<div class="form-group">
				<?php echo $form->labelEx($model,'name'); ?>
                <?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Nama lengkap')); ?>
                <?php echo $form->error($model,'name'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
                <?php echo $form->error($model,'username'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Alamat email, misal blah@test.com')); ?>
                <?php echo $form->error($model,'email'); ?>
			</div>
			<?php if($model->isNewRecord) { ?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
                <?php echo $form->error($model,'password'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'passwordConfirm'); ?>
                <?php echo $form->passwordField($model,'passwordConfirm',array('class'=>'form-control','placeholder'=>'Password')); ?>
                <?php echo $form->error($model,'passwordConfirm'); ?>
			</div>
			<?php } ?>
		</div>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
		<?php echo CHtml::submitButton('Reset Password',array('class'=>'btn btn-primary','id'=>'btn-reset')); ?>
		<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('users/admin'))); ?>
	</div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
