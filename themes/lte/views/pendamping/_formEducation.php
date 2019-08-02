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
        <?php echo $form->textField($model,'nama_institusi',array('class'=>'form-control','placeholder'=>'Nama Institusi')); ?>
        <?php echo $form->error($model,'nama_institusi'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'tingkat',array('class'=>'form-control','placeholder'=>'Tingkat')); ?>
        <?php echo $form->error($model,'tingkat'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->textField($model,'tahun_lulus',array('class'=>'form-control','placeholder'=>'Tahun Lulus')); ?>
        <?php echo $form->error($model,'tahun_lulus'); ?>
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
            'nama_institusi',
            'tingkat',
            'tahun_lulus'
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
