<?php
/* @var $this DosenController */
/* @var $model Dosen */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/bootstrap-datepicker.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/datepicker/datepicker3.css');
Yii::app()->clientScript->registerScript('dosen_add',"
        $('.date').datepicker({
            autoclose: true,
            format : 'yyyy-mm-dd'
        });
");
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><small>Isian bertanda * tidak boleh dikosongkan</small></h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'page-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('role'=>'form')
    )); ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $form->labelEx($model,'nidn'); ?>
            <?php echo $form->textField($model,'nidn',array('class'=>'form-control','placeholder'=>'Nomor Induk Dosen Nasional')); ?>
            <?php echo $form->error($model,'nidn'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nip'); ?>
            <?php echo $form->textField($model,'nip',array('class'=>'form-control','placeholder'=>'Nomor Induk Pegawai')); ?>
            <?php echo $form->error($model,'nip'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nama'); ?>
            <?php echo $form->textField($model,'nama',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'nama'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'tempat_lahir'); ?>
            <?php echo $form->textField($model,'tempat_lahir',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'tempat_lahir'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'tanggal'); ?>
            <?php echo $form->textField($model,'tanggal', array('class'=>'form-control date')); ?>
            <?php echo $form->error($model,'tanggal'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'jenis_kelamin'); ?><br />
            <?php echo $form->radioButtonList($model,'jenis_kelamin', DosenForm::getAllJenisKelaminOptions()); ?>
            <?php echo $form->error($model,'jenis_kelamin'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'kewarganegaraan'); ?><br />
            <?php echo $form->radioButtonList($model,'kewarganegaraan',DosenForm::getAllKewarganegaraanOptions()); ?>
            <?php echo $form->error($model,'kewarganegaraan'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'agama'); ?>
            <?php echo $form->dropDownList($model,'agama',DosenForm::getAllAgamaOptions(),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'agama'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nik'); ?>
            <?php echo $form->textField($model,'nik',array('class'=>'form-control','maxlength'=>32)); ?>
            <?php echo $form->error($model,'nik'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'alamat'); ?>
            <?php echo $form->textField($model,'alamat',array('class'=>'form-control','maxlength'=>64)); ?>
            <?php echo $form->error($model,'alamat'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'kabupaten'); ?>
            <?php echo $form->textField($model,'kabupaten',array('class'=>'form-control','maxlength'=>32)); ?>
            <?php echo $form->error($model,'kabupaten'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nama_ayah'); ?>
            <?php echo $form->textField($model,'nama_ayah',array('class'=>'form-control','maxlength'=>64)); ?>
            <?php echo $form->error($model,'nama_ayah'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'nama_ibu'); ?>
            <?php echo $form->textField($model,'nama_ibu',array('class'=>'form-control','maxlength'=>64)); ?>
            <?php echo $form->error($model,'nama_ibu'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'status_pegawai'); ?>
            <?php echo $form->textField($model,'status_pegawai',array('class'=>'form-control','maxlength'=>16)); ?>
            <?php echo $form->error($model,'status_pegawai'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'status_ikatan_kerja'); ?>
            <?php echo $form->textField($model,'status_ikatan_kerja',array('class'=>'form-control','maxlength'=>16)); ?>
            <?php echo $form->error($model,'status_ikatan_kerja'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'no_sk_pengangkatan'); ?>
            <?php echo $form->textField($model,'no_sk_pengangkatan',array('class'=>'form-control','maxlength'=>64)); ?>
            <?php echo $form->error($model,'no_sk_pengangkatan'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'tgl_sk_pengangkatan'); ?>
            <?php echo $form->textField($model,'tgl_sk_pengangkatan', array('class'=>'form-control date')); ?>
            <?php echo $form->error($model,'tgl_sk_pengangkatan'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'tgl_masuk'); ?>
            <?php echo $form->textField($model,'tgl_masuk', array('class'=>'form-control date')); ?>
            <?php echo $form->error($model,'tgl_masuk'); ?>
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
        <?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-success')); ?>
        &nbsp;
        <?php echo CHtml::linkButton('Kembali',array('class'=>'btn btn-danger','href'=>array('dosen/admin'))); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
