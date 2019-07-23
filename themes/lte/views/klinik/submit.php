<?php
/* @var $this UsersController */
/* @var $form CActiveForm */
/* @var $model Users */
/* @var $klinik KlinikCustom */
/* @var $kontak KontakCustom */
/* @var $alamat AlamatCustom */
/* @var $fasilitas FasilitasKlinikCustom */
/* @var $pengajuan PengajuanAkreditasiCustom */
/* @var $form_pengajuan PengajuanAkreditasiForm */



$this->pageTitle = 'Pengajuan Permohonan Akreditasi';

$this->breadcrumbs=array(
	'Klinik'=>array('admin'),
    'Permohonan'
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Sebelum mengajukan permohonan, pastikan kelengkapan data dan dokumen klinik</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
            <?php if ($success=Yii::app()->user->getFlash('success')) {?>
                <div class="alert alert-success"><?php echo $success ?></div>
            <?php } ?>
            <h4><i>Kelengkapan Profile Klinik</i></h4>
            <table class="table table-striped table-hover submit-assessment">
                <tbody>
                    <tr>
                        <th style="width: 25%">Informasi Umum</th>
                        <td>
                            <?php if($klinik->isComplete()) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat Klinik</th>
                        <td>
                            <?php if(!empty($alamat)) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Kontak Klinik</th>
                        <td>
                            <?php if(!empty($kontak)) { ?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Fasilitas Klinik</th>
                        <td>
                            <?php if(!empty($fasilitas)) { ?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Foto Klinik</th>
                        <td>
                            <?php if($klinik->hasPhotos() >=2 ) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } elseif ($klinik->hasPhotos() > 0) { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-times-circle"></i> Tidak Ada</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Dokumen Pendukung</th>
                        <td>
                            <?php if($pengajuan->hasDocuments() >= 3) {?>
                                <a class="btn btn-sm btn-success" href="#"> <i class="fa fa-check-square-o"></i></a>
                            <?php } elseif ($pengajuan->hasDocuments() > 0) {?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-times-circle"></i> Tidak Ada</a>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
		</div><!-- /.box-body -->
		<div class="box-footer">
            <?php
                $submitable=false;
                if ($klinik->isComplete() && !empty($alamat) && !empty($kontak) && !empty($fasilitas)
                && $klinik->hasPhotos() >= 2 && $pengajuan->hasDocuments() >= 3 && $pengajuan->status == StatusPengajuan::DRAFT) {
                    $submitable=true;
                }
            ?>
            <?php
                if($submitable) {
                    $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'submit-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    ));
            ?>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($form_pengajuan,'jenis_pengajuan'); ?>
                            <?php echo $form->dropDownList($form_pengajuan,'jenis_pengajuan', PengajuanAkreditasiCustom::getAllJenisPengajuanOptions(),
                                array('class'=>'form-control','prompt'=>'Pilih Jenis Usulan')); ?>
                            <?php echo $form->error($form_pengajuan,'jenis_pengajuan'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo CHtml::submitButton('Submit Permohonan', array('class'=>'btn btn-primary')) ?>
                        </div>
                    </div>

            <?php $this->endWidget(); ?>
            <?php } elseif($pengajuan->status > StatusPengajuan::DRAFT) { ?>
                    <div class="alert alert-info">Anda sudah mengajukan permohonan, silahkan pantau dari menu Pemantauan</div>
            <?php } else { ?>
            <button class="btn btn-primary" disabled>Submit Permohonan</button>
            <?php } ?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



