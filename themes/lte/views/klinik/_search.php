<?php
/* @var $model KlinikCustom */
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
                <?php echo $form->label($model,'nama'); ?>
                <?php echo $form->textField($model,'nama',array('class'=>'form-control','placeholder'=>'Nama Klinik')); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="form-group">
                <?php echo $form->label($model,'id_regency'); ?>
                <?php echo $form->dropDownList($model,'id_regency',RegencyCustom::getAllRegencyOptions(),array('class'=>'form-control','prompt'=>'Pilih Wilayah')); ?>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <?php echo CHtml::submitButton('Search', array('class'=>'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>
