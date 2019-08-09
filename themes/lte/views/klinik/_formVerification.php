<?php
/* @var $this KlinikController */
/* @var $form CActiveForm */
/* @var $model PengajuanAkreditasiCustom */
/* @var $pengajuan PengajuanAkreditasiCustom */
/* @var $klinik KlinikCustom*/
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
        <?php if (Yii::app()->user->isSudin()) {?>
        <div class="box-body">
            <div class="alert alert-info">
                Tandai pada bagian yang sesuai kriteria
            </div>
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
        <?php } else { ?>
        <div class="box-body">
            <div class="alert alert-warning">Proses verifikasi klinik sepenuhnya adalah kewenangan Suku Dinas</div>
            <table class="table table-striped table-hover">
                <tbody>
                <tr>
                    <th>Kriteria Pengecekan</th>
                    <th>Verifikasi Sudin</th>
                </tr>
                <tr>
                    <th >Informasi Umum</th>
                    <td>
                        <?php if(!isset($pengajuan->status_info)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_info == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>

                </tr>
                <tr>
                    <th>Alamat Klinik</th>
                    <td>
                        <?php if(!isset($pengajuan->status_alamat)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_alamat == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Kontak Klinik</th>
                    <td>
                        <?php if(!isset($pengajuan->status_kontak)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_kontak == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Fasilitas Klinik</th>
                    <td>
                        <?php if(!isset($pengajuan->status_fasilitas)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_fasilitas == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Foto Klinik</th>
                    <td>
                        <?php if(!isset($pengajuan->status_foto)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_foto == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Pendukung</th>
                    <td>
                        <?php if(!isset($pengajuan->status_dokumen)) { ?>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i> Belum Dicek</a>
                        <?php } elseif($pengajuan->status_dokumen == 0) { ?>
                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-times"></i> Tidak Lengkap</a>
                        <?php } else {?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"> Lengkap</i></a>
                        <?php } ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
<?php $this->endWidget(); ?>