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

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/select2/select2.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/select2/select2.full.min.js');
Yii::app()->clientScript->registerScript('form-contact', "
        $('#provinsi').select2();
        $('#kota').select2();
        $('#kecamatan').select2();
        $('#provinsi').on('change',function(e){
            var prov = $(this).val();
            var url = '".Yii::app()->createUrl('wilayah/kota')."?id_prov='+prov;
            ".CHtml::ajax(array(
                'url'=>'js:url',
                'type'=>'POST',
                'dataType'=>'JSON',
                'success'=>"function(response){
                    $('#kota').empty().select2({
                        data: response
                    })
                }"
            ))."
        });
        $('#kota').on('change', function(){
            var kota = $(this).val();
            var url = '".Yii::app()->createUrl('wilayah/kecamatan')."?id_kota='+kota;
            ".CHtml::ajax(array(
                'url'=>'js:url',
                'type'=>'POST',
                'dataType'=>'JSON',
                'success'=>"function(response){
                    $('#kecamatan').empty().select2({
                        data: response
                    });
                }"
            ))."
        });
", CClientScript::POS_END);

?>

<div class="col-lg-6 col-xs-12">
    <?php if ($success=Yii::app()->user->getFlash('success')) {?>
        <div class="alert alert-success">
            <?php echo $success ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <?php echo $form->labelEx($model,'alamat_1'); ?>
        <?php echo $form->textField($model,'alamat_1',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'alamat_1'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'alamat_2'); ?>
        <?php echo $form->textField($model,'alamat_2',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'alamat_2'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'provinsi'); ?>
        <?php echo $form->dropDownList($model,'provinsi',ProvinceCustom::getAllDefaultOptions(),
            array('class'=>'form-control','id'=>'provinsi')); ?>
        <?php echo $form->error($model,'provinsi'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'kota'); ?>
        <?php echo $form->dropDownList($model,'kota',RegencyCustom::getAllRegencyOptions(),
            array('class'=>'form-control','prompt'=>'Pilih Kabupaten/Kota','id'=>'kota')); ?>
        <?php echo $form->error($model,'kota'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'kecamatan'); ?>
        <?php echo $form->dropDownList($model,'kecamatan', DistrictCustom::getAllDistrictOptions($model->kota),
            array('class'=>'form-control','prompt'=>'Pilih Kecamatan','id'=>'kecamatan')); ?>
        <?php echo $form->error($model,'kecamatan'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'no_hp'); ?>
        <?php echo $form->textField($model,'no_hp',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'no_hp'); ?>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
