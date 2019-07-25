<?php
/* @var $this SiteController */
/* @var $pengajuan PengajuanAkreditasiCustom */
$totalKlinik = SudinCustom::countAvailableKlinik();
$registeredKlinik = KlinikCustom::countAllRegisteredKlinik();
$progress = round($registeredKlinik/$totalKlinik*100, 2);

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/chartjs/Chart.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('chartjs', "
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChart = new Chart(pieChartCanvas);
    var totalKlinik = ".$totalKlinik.";
    var totalRegistered = ".$registeredKlinik.";
    var pieData = [
        {value: totalKlinik-totalRegistered, color: '#dd4b39 ', highlight: '#dd4b39', label:'Belum Registrasi'},
        {value: totalRegistered, color: '#43add7', highlight: '#43add7', label:'Sudah Registrasi'},
    ];
    
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 1,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true
    };
    
    pieChart.Doughnut(pieData, pieOptions);
", CClientScript::POS_READY);

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
                <a href="<?php echo Yii::app()->createUrl('klinik/admin')?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="<?php echo Yii::app()->createUrl('klinik/monitor')?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="<?php echo Yii::app()->createUrl('akreditasi/admin')?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="<?php echo Yii::app()->createUrl('akreditasi/admin')?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-7 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Usulan Akreditasi Klinik</h3>
                </div>
                <div class="box-body">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'pengajuan-grid',
                        'dataProvider'=>$pengajuan->searchForDashboard(),
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
                        'template'=>'{summary}{items}{pager}',
                        'pagerCssClass'=>'dataTables_paginate paging_simple_numbers text-center',
                        'pager'=>array(
                            'htmlOptions'=>array('class'=>'pagination'),
                            'internalPageCssClass'=>'paginate_button',
                            'selectedPageCssClass'=>'active',
                            'header'=>''
                        )
                    )); ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-lg-5 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Progres Pendaftaran Klinik: <?php echo $progress.'%' ?></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="height: 342px">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->