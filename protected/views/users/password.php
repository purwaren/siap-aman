<?php
$this->breadcrumbs=array(
	'Pengguna'=>array('index'),
	'Ganti Password',
	
);

$this->menu=array(
	//array('label'=>'List Users', 'url'=>array('index')),
	//array('label'=>'Create Users', 'url'=>array('create')),
	//array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Ganti Password</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Isian bertanda <span class="required">*</span> tidak boleh dikosongkan.</p>
	
	<?php echo $form->errorSummary($model); ?>

	<table>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'username'); ?></td>
			<td class="value-column"><?php echo $form->textField($model,'username',array('maxlength'=>128,'readonly'=>true)); ?>
		</td>
		</tr>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'old_password'); ?></td>
			<td class="value-column"><?php echo $form->passwordField($model,'old_password'); ?>
		</td>
		</tr>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'password'); ?></td>
			<td class="value-column"><?php echo $form->passwordField($model,'password'); ?>
		</td>
		</tr>
		<tr>
			<td class="label-column"><?php echo $form->labelEx($model,'confirm_password'); ?></td>
			<td class="value-column"><?php echo $form->passwordField($model,'confirm_password'); ?>
		</td>
		</tr>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->