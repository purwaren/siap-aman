<?php
/* @var $this UsersController */
/* @var $model Users */
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
            <h4><i>Kelengkapan Profile Klinik</i></h4>
            <table class="table table-striped table-hover submit-assessment">
                <tbody>
                    <tr>
                        <th style="width: 25%">Informasi Umum</th><td><a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i> Lengkap</a> </td>
                    </tr>
                    <tr>
                        <th>Alamat Klinik</th><td><a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i> Lengkap</a> </td>
                    </tr>
                    <tr>
                        <th>Kontak Klinik</th><td><a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i> Lengkap</a> </td>
                    </tr>
                    <tr>
                        <th>Fasilitas Klinik</th><td><a class="btn btn-sm btn-success" href="#"><i class="fa fa-check-square-o"></i> Lengkap</a> </td>
                    </tr>
                    <tr>
                        <th>Foto Klinik</th><td><a class="btn btn-sm btn-warning" href="#"><i class="fa fa-warning"></i> Belum Lengkap</a> </td>
                    </tr>
                    <tr>
                        <th>Dokumen Pendukung</th><td><a class="btn btn-sm btn-danger" href="#"> <i class="fa fa-times-circle"></i> Tidak Ada</a> </td>
                    </tr>
                </tbody>
            </table>
		</div><!-- /.box-body -->
		<div class="box-footer">
            <button class="btn btn-primary" disabled>Submit Permohonan</button>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



