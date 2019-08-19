<?php
/* @var $this KlinikController */
/* @var $form CActiveForm */
/* @var $model FeedbackForm */

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/fileinput.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/bootstrap-fileinput/css/fileinput.min.css');

Yii::app()->clientScript->registerScript('upload',"
    $('#rekomendasi').fileinput({
        showCaption: true,
        uploadUrl: '".Yii::app()->createUrl('klinik/uploadResult',array('id_klinik'=>$model->id))."',
        uploadAsync: true,
        maxFileSize: 4096,
        maxFileCount: 1
    });
",CClientScript::POS_END);

?>

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
    <div class="col-lg-6 col-xs-12">
        <div class="form-group">
            <?php echo $form->labelEx($model,'tingkatan'); ?>
            <?php echo $form->dropDownList($model,'tingkatan',KlinikCustom::getAllTingkatanOptions(),
                array('class'=>'form-control','prompt'=>'Pilih Hasil')); ?>
            <?php echo $form->error($model,'tingkatan'); ?>
        </div>
        <div class="form-group">
            <label>Dokumen Hasil Rekomendasi</label>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                        <input type="file" multiple class="file-loading" id="rekomendasi" data-show-preview="false"/>
					</span>
            </div>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary'))?>
        </div>
    </div>
<?php $this->endWidget(); ?>