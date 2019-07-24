<?php
/* @var $this KlinikController */
/* @var $form CActiveForm */
/* @var $model PengajuanAkreditasiCustom */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sudin-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'form-horizontal'),
));
?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Verifikasi Profile, Foto & Dokumen</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th style="width: 35%;">Profil Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_info')?>
                    </td>
                </tr>
                <tr>
                    <th>Alamat Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_alamat')?>
                    </td>
                </tr>
                <tr>
                    <th>Kontak Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_kontak')?>
                    </td>
                </tr>
                <tr>
                    <th>Fasilitas Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_fasilitas')?>
                    </td>
                </tr>
                <tr>
                    <th>Foto Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_foto')?>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Klinik</th>
                    <td>
                        <?php echo $form->checkBox($model, 'status_dokumen')?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-footer">
            <?php echo CHtml::submitButton('Simpan', array('class'=>'btn btn-primary'))?>
            <?php echo CHtml::resetButton('Reset', array('class'=>'btn btn-danger'))?>
        </div>
    </div>
<?php $this->endWidget(); ?>