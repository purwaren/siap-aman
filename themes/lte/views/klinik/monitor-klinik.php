<?php
/* @var $this UsersController */
/* @var $form CActiveForm */
/* @var $pengajuan PengajuanAkreditasiCustom */


$this->pageTitle = 'Pemantauan Pendampingan - No. Urut '.$pengajuan->no_urut;

$this->breadcrumbs=array(
	'Klinik'=>array('admin'),
    'Pemantauan'
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Anda bisa memantau proses pengajuan permohonan, feedback dari sudin akan muncul di sini</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
            <?php if ($success=Yii::app()->user->getFlash('success')) {?>
                <div class="alert alert-success"><?php echo $success ?></div>
            <?php } ?>
            <?php if (empty($pengajuan->jenis_pengajuan)) { ?>
                <div class="alert alert-warning">Anda belum mengajukan permohonan, silakan lakukan pengajuan permohonan terlebih dahulu</div>
            <?php } else { ?>
            <div class="col-lg-6 col-xs-12">
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$pengajuan,
                    'attributes'=>array(
                        'no_urut',
                        array(
                            'name'=>'jenis_pengajuan',
                            'value'=>$pengajuan->getJenisPengajuan()
                        ),
                        array(
                            'name'=>'tgl_pengajuan',
                            'value'=>DateUtil::dateToString($pengajuan->tgl_pengajuan)
                        ),
                        array(
                            'name'=>'status',
                            'value'=>$pengajuan->getStatus()
                        ),
                    ),
                    'htmlOptions'=>array(
                        'class'=>'table table-hover table-striped monitor-klinik'
                    ),
                )); ?>
            </div>
            <?php } ?>
		</div>
		<div class="box-footer">

		</div>
	</div>
</section>



