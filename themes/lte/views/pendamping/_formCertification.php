<?php
/* @var $this PendampingController */
/* @var $model ProfilePendampingForm */
/* @var $form CActiveForm */

$form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal'),
));

?>

<?php if ($success=Yii::app()->user->getFlash('success')) {?>
    <div class="alert alert-success">
        <?php echo $success ?>
    </div>
<?php } ?>
<div class="col-lg-6 col-xs-12">
    <div class="form-group">
        <?php echo $form->textField($model,'no_sertifikat',array('class'=>'form-control','placeholder'=>'Nomor Sertifikat')); ?>
        <?php echo $form->error($model,'no_sertifikat'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'nama',array('class'=>'form-control','placeholder'=>'Nama Sertifikat')); ?>
        <?php echo $form->error($model,'nama'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'bidang_peminatan',array('class'=>'form-control','placeholder'=>'Bidang Peminatan')); ?>
        <?php echo $form->error($model,'bidang_peminatan'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'penyelenggara',array('class'=>'form-control','placeholder'=>'Penyelenggara')); ?>
        <?php echo $form->error($model,'penyelenggara'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'tgl_perolehan',array('class'=>'form-control','placeholder'=>'Tanggal Perolehan')); ?>
        <?php echo $form->error($model,'tgl_perolehan'); ?>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<div class="col-lg-12">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'education-grid',
        'dataProvider'=>$model->search(),
        //'filter'=>$model,
        'columns'=>array(
            array(
                'header'=>'No',
                'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
            ),
            'nama',
            'penyelenggara',
            'tgl_perolehan'
        ),
        'htmlOptions' => array(
            'class' => 'table table-striped'
        ),
        'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
        'itemsCssClass' => 'table table-striped table-hover',
        'cssFile' => false,
        'summaryCssClass' => 'dataTables_info',
        'template'=>'{items}'
    )); ?>
</div>
