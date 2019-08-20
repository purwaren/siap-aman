<?php
/* @var $this KlinikController */
/* @var $form CActiveForm */
/* @var $model KlinikResultForm */

$this->pageTitle = 'Nilai Akreditasi'.(!empty($model->klinik)?' - '.$model->klinik->nama:'');
$this->breadcrumbs = array(
    'Nilai Akreditasi'
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/bootstrap-datepicker.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/datepicker3.css');

Yii::app()->clientScript->registerScript('upload',"
    $('#rekomendasi').fileinput({
        showCaption: true,
        uploadUrl: '".Yii::app()->createUrl('klinik/uploadResult',array('id_klinik'=>$model->klinik->id))."',
        uploadAsync: true,
        maxFileSize: 4096,
        maxFileCount: 1
    });
    $('#feedback-form').submit(function(event){
        $('.fileinput-upload-button').click();
        event.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        ".CHtml::ajax(array(
            'url'=>'js:url',
            'type'=>'POST',
            'dataType'=>'JSON',
            'data'=>'js:data',
            'success'=>"function(resp){
                $('#success-msg').html(resp.msg);
                $('#success-msg').show();
            }"
        ))."
    });
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
",CClientScript::POS_END);

?>
<section class="content">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'feedback-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    ));
    ?>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Upload Nilai Akreditasi</small></h3>
        </div>
        <div class="box-body">
            <div class="alert alert-success" id="success-msg" style="display: none"></div>
            <div class="col-lg-6 col-xs-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'tgl_penetapan'); ?>
                    <?php echo $form->textField($model,'tgl_penetapan',array('class'=>'form-control datepicker')); ?>
                    <?php echo $form->error($model,'tingkatan'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'tingkatan'); ?>
                    <?php echo $form->dropDownList($model,'tingkatan',KlinikCustom::getAllTingkatanOptions(),
                        array('class'=>'form-control','prompt'=>'Pilih Hasil')); ?>
                    <?php echo $form->error($model,'tingkatan'); ?>
                </div>
                <div class="form-group">
                    <label>Dokumen Hasil Rekomendasi *</label>
                    <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                        <input type="file" multiple class="file-loading" id="rekomendasi" data-show-preview="false"/>
					</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary'))?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</section>


