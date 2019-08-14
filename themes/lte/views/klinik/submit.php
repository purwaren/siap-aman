<?php
/* @var $this UsersController */
/* @var $form CActiveForm */
/* @var $model PengajuanAkreditasiCustom */
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
            <table class="table table-striped table-hover submit-assessment">
                <tbody>
                    <tr>
                        <th style="width: 25%">Kriteria Pengecekan</th>
                        <th style="width: 15%">Kelengkapan</th>
                        <th>Verifikasi Sudin</th>
                    </tr>
                    <tr>
                        <th >Informasi Umum</th>
                        <td>
                            <?php if($klinik->isComplete()) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
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
                            <?php if(!empty($alamat)) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
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
                            <?php if(!empty($kontak)) { ?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
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
                            <?php if(!empty($fasilitas)) { ?>
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } ?>
                        </td>
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
                            <?php if($klinik->hasPhotos() >=2 ) { ?>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i></a>
                            <?php } elseif ($klinik->hasPhotos() > 0) { ?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-times-circle"></i> Tidak Ada</a>
                            <?php } ?>
                        </td>
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
                            <?php if($pengajuan->hasDocuments() >= 3) {?>
                                <a class="btn btn-sm btn-success" href="#"> <i class="fa fa-check-square-o"></i></a>
                            <?php } elseif ($pengajuan->hasDocuments() > 0) {?>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a>
                            <?php } else { ?>
                                <a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-times-circle"></i> Tidak Ada</a>
                            <?php } ?>
                        </td>
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
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Riwayat Pengajuan</small></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'pengajuan-akreditasi-grid',
                'dataProvider'=>$model->searchForRiwayat(),
                //'filter'=>$model,
                'columns'=>array(
                    array(
                        'header'=>'No',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                    ),
                    array(
                        'name'=>'tgl_pengajuan',
                        'value'=>'DateUtil::dateToString($data->tgl_pengajuan)'
                    ),
                    array(
                        'name'=>'jenis_pengajuan',
                        'value'=>'ucfirst($data->jenis_pengajuan)'
                    ),
                    array(
                        'name'=>'status',
                        'value'=>'ucfirst($data->getStatus())'
                    ),
                    array(
                        'name'=>'tgl_penetapan',
                        'value'=>'DateUtil::dateToString($data->tgl_penetapan)'
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Detail Usulan','data-toggle'=>'tooltip'),
                                'url'=>'Yii::app()->createUrl("klinik/monitor",array("id"=>$data->id))'
                            ),
                        )
                    ),
                ),
                'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                'cssFile' => false,
                'summaryCssClass' => 'dataTables_info',
                'template'=>'{summary}{items}{pager}',
                'pagerCssClass'=>'dataTables_paginate paging_simple_numbers text-center',
                'pager'=>array(
                    'htmlOptions'=>array('class'=>'pagination'),
                    'internalPageCssClass'=>'paginate_button',
                    'selectedPageCssClass'=>'active',
                    'header'=>''
                )
            )); ?>
        </div>
    </div>
</section><!-- /.content -->



