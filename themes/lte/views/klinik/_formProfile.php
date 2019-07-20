<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'klinik-form',
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
        <?php if ($success=Yii::app()->user->getFlash('success')) { ?>
        <div class="alert alert-success">
            <?php echo $success ?>
        </div>
        <?php } elseif ($error=Yii::app()->user->getFlash('error')) { ?>
        <div class="alert alert-error">
            <?php echo $error ?>
        </div>
        <?php } ?>
        <h4><i>Informasi Umum Terkait Klinik</i></h4>
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo $form->labelEx($model,'kode_klinik'); ?>
                <?php echo $form->textField($model,'kode_klinik',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'kode_klinik'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'nama'); ?>
                <?php echo $form->textField($model,'nama',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'nama'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'no_izin'); ?>
                <?php echo $form->textField($model,'no_izin',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'no_izin'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'kepemilikan'); ?>
                <?php echo $form->textField($model,'kepemilikan',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'kepemilikan'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'penanggung_jawab'); ?>
                <?php echo $form->textField($model,'penanggung_jawab',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'penanggung_jawab'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'karakteristik'); ?>
                <?php echo $form->dropDownList($model,'karakteristik',KlinikCustom::getAllJenisKlinikOptions(),
                    array('class'=>'form-control', 'prompt'=>'Pilih Jenis Klinik')); ?>
                <?php echo $form->error($model,'karakteristik'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'tingkatan'); ?>
                <?php echo $form->dropDownList($model,'tingkatan',KlinikCustom::getAllTingkatanOptions(),
                    array('class'=>'form-control','prompt'=>'Pilih Tingkatan')); ?>
                <?php echo $form->error($model,'tingkatan'); ?>
            </div>
        </div>
        <h4><i>Alamat Klinik</i></h4>
        <div class="col-lg-12">
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
                <?php echo $form->labelEx($model,'kecamatan'); ?>
                <?php echo $form->textField($model,'kecamatan',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'kecamatan'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'kota'); ?>
                <?php echo $form->textField($model,'kota',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'kota'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'provinsi'); ?>
                <?php echo $form->textField($model,'provinsi',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'provinsi'); ?>
            </div>
        </div>
        <h4><i>Kontak / Media Komunikasi Klinik</i></h4>
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo $form->labelEx($model,'no_telp'); ?>
                <?php echo $form->textField($model,'no_telp',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'no_telp'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'no_fax'); ?>
                <?php echo $form->textField($model,'no_fax',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'no_fax'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'website'); ?>
                <?php echo $form->textField($model,'website',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'website'); ?>
            </div>
        </div>
        <h4><i>Fasilitas yang Tersedia di Klinik</i></h4>
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo $form->labelEx($model,'qty_tempat_tidur'); ?>
                <?php echo $form->numberField($model,'qty_tempat_tidur',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'qty_tempat_tidur'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'penyelenggaraan'); ?>
                <?php echo $form->dropDownList($model,'penyelenggaraan',FasilitasKlinikCustom::getAllPenyelenggaraanOptions(),
                    array('class'=>'form-control','prompt'=>'Pilih Kemampuan Penyelenggaraan')); ?>
                <?php echo $form->error($model,'penyelenggaraan'); ?>
            </div>
        </div>
	</div><!-- /.box-body -->
	<div class="box-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <a href="<?php echo Yii::app()->createUrl('site/index')?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
	</div>
</div><!-- /.box -->

<?php $this->endWidget(); ?>
