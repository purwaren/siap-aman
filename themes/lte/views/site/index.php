<?php
/* @var $this SiteController */
/* @var $pengajuan PengajuanAkreditasiCustom */



$this->pageTitle = 'Dashboard';
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo KlinikCustom::countAllRegisteredKlinik() ?></h3>

                    <p>Klinik</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="#" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo PengajuanAkreditasiCustom::countAll() ?></h3>

                    <p>Usulan Akreditasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
                <a href="#" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo PengajuanAkreditasiCustom::countAllCanceled()?></h3>

                    <p>Batal Akreditasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-cancel"></i>
                </div>
                <a href="#" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo PengajuanAkreditasiCustom::countAllAccept()?></h3>

                    <p>Hasil Akreditasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark"></i>
                </div>
                <a href="#" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Usulan Akreditasi Klinik</h3>
                </div>
                <div class="box-body">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pengajuan-grid',
                        'dataProvider'=>$pengajuan->search(),
                        //'filter'=>$model,
                        'columns'=>array(
                            'no_urut',
                            'idKlinik.nama',
                            array(
                                'name'=>'jenis_pengajuan',
                                'value'=>'$data->getJenisPengajuan()',
                            ),
                            array(
                                'name'=>'tgl_pengajuan',
                                'value'=>'DateUtil::dateToString($data->tgl_pengajuan)'
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template' => '{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-search"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Detail','data-toggle'=>'tooltip')
                                    )
                                )
                            ),
                        ),
                        'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
                        'cssFile' => false,
                        'summaryCssClass' => 'dataTables_info',
                        'template'=>'{items}{summary}'
                    )); ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Progres Pendaftaran Klinik</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->