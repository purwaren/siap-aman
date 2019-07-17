<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
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
		<div class="col-md-6">

			<div class="form-group">
				<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-4 control-label')); ?>
				<div class="col-sm-8">
					<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Nama lengkap')); ?>
					<?php echo $form->error($model,'name'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-4 control-label')); ?>
				<div class="col-sm-8">
					<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-4 control-label')); ?>
				<div class="col-sm-8">
					<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Alamat email, misal blah@test.com')); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
			</div>
			<?php if($model->isNewRecord) { ?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-4 control-label')); ?>
				<div class="col-sm-8">
					<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'passwordConfirm',array('class'=>'col-sm-4 control-label')); ?>
				<div class="col-sm-8">
					<?php echo $form->passwordField($model,'passwordConfirm',array('class'=>'form-control','placeholder'=>'Password')); ?>
					<?php echo $form->error($model,'passwordConfirm'); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div><!-- /.box-body -->
	<div class="box-footer">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success col-sm-offset-2')); ?>
		&nbsp;
		<?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('users/admin'))); ?>
	</div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
