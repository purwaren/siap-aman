<?php
/* @var $model PengajuanAkreditasiCustom */
/* @var $form CActiveForm */

$form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'htmlOptions'=>array('role'=>'form', 'id'=>'search-form')
)); ?>
<div class="box-body">
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="form-group">
                <?php echo $form->label($model,'nama_klinik'); ?>
                <?php echo $form->textField($model,'nama_klinik',array('class'=>'form-control','placeholder'=>'Nama Klinik')); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton('Search', array('class'=>'btn btn-default')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>