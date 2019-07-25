<?php
/* @var $this PendampingController */
/* @var $model PendampingCustom */
/* @var $pendidikan RiwayatPendidikanCustom */
/* @var $sertifikasi SertifikasiCustom */
/* @var $pekerjaan RiwayatPekerjaanCustom */


$this->pageTitle = 'Detil Usulan';

$this->breadcrumbs=array(
	'Usulan Akreditasi'=>array('admin'),
	$model->id,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi tentang usulan akreditasi klinik</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            'no_urut',
                            'idKlinik.kode_klinik',
                            array(
                                'name'=>'jenis_pengajuan',
                                'value'=>$model->getJenisPengajuan()
                            ),
                            array(
                                'name'=>'tgl_pengajuan',
                                'value'=>DateUtil::dateToString($model->tgl_pengajuan)
                            ),
                            array(
                                'name'=>'status',
                                'value'=>$model->getStatus()
                            ),
                        ),
                        'htmlOptions'=>array(
                            'class'=>'table table-hover table-striped monitor-klinik'
                        ),
                    )); ?>
                </div>
            </div>
		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('akreditasi/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



