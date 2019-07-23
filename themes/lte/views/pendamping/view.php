<?php
/* @var $this PendampingController */
/* @var $model PendampingCustom */
/* @var $pendidikan RiwayatPendidikanCustom */
/* @var $sertifikasi SertifikasiCustom */
/* @var $pekerjaan RiwayatPekerjaanCustom */


$this->pageTitle = 'Detil Pendamping';

$this->breadcrumbs=array(
	'Pendamping'=>array('admin'),
	$model->id,
);

?>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><small>Informasi tentang pendamping klinik</small></h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4><i>Profil Umum</i></h4>
                    <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            array(
                                'name'=>'tipe',
                                'value'=>$model->getTipe()
                            ),
                            array(
                                'name'=>'nama',
                                'value'=>$model->gelar_depan." ".$model->nama." ".$model->gelar_belakang,
                            ),
                            'tempat_lahir',
                            'tanggal_lahir',
                            'jabatan',
                            'no_hp',
                            'email',
                            'created_by',
                            'created_at',
                            'updated_by',
                            'updated_at'
                        ),
                        'htmlOptions'=>array(
                            'class'=>'table table-hover table-striped detil-klinik'
                        ),
                    )); ?>
                    <h4><i>Riwayat Pendidikan</i></h4>
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pendidikan-grid',
                        'dataProvider'=>$pendidikan->search(),
                        //'filter'=>$model,
                        'columns'=>array(
                            array(
                                'header'=>'No',
                                'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                            ),
                            'nama_institusi',
                            'tingkat',
                            'tahun_lulus',
                        ),
                        'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                        'cssFile' => false,
                        'summaryCssClass' => 'dataTables_info',
                        'template'=>'{items}'
                    )); ?>
                    <h4><i>Sertifikasi</i></h4>
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'sertifikasi-grid',
                        'dataProvider'=>$sertifikasi->search(),
                        //'filter'=>$model,
                        'columns'=>array(
                            array(
                                'header'=>'No',
                                'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                            ),
                            'no_sertifikat',
                            'nama',
                            'bidang_peminatan',
                            'penyelenggara',
                            'tgl_perolehan',
                        ),
                        'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                        'cssFile' => false,
                        'summaryCssClass' => 'dataTables_info',
                        'template'=>'{items}'
                    )); ?>
                    <h4><i>Riwayat Pekerjaan</i></h4>
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'sertifikasi-grid',
                        'dataProvider'=>$pekerjaan->search(),
                        //'filter'=>$model,
                        'columns'=>array(
                            array(
                                'header'=>'No',
                                'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize+$row+1'
                            ),
                            'nama_institusi',
                            'jabatan',
                            'mulai',
                            'berakhir'
                        ),
                        'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                        'cssFile' => false,
                        'summaryCssClass' => 'dataTables_info',
                        'template'=>'{items}'
                    )); ?>
                </div>
            </div>

		</div><!-- /.box-body -->
		<div class="box-footer">
			<?php echo CHtml::link('Kembali',array('pendamping/admin'),array('class'=>'btn btn-primary'))?>
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
</section><!-- /.content -->



