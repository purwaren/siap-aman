<?php
/* @var $this Controller */
/* @var $pengajuan PengajuanAkreditasiCustom */

$this->pageTitle = 'Pemantauan Pendampingan';
$this->breadcrumbs = array(
    'Klinik' => array('klinik/admin'),
    'Pemantauan'
);
?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar usulan akreditasi yang perlu untuk diproses</small></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'users-grid',
                'dataProvider'=>$pengajuan->search(),
                'columns'=>array(
                    'no_urut',
                    'idKlinik.nama',
                    'idKlinik.penanggung_jawab',
                    array(
                        'header'=>'Kota',
                        'value'=>'$data->idKlinik->getRegency()',
                        'visible'=>Yii::app()->user->isAdmin() || Yii::app()->user->isDinkes(),
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
                        'class'=>'CButtonColumn',
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Detail Usulan','data-toggle'=>'tooltip'),
                                'url' => 'Yii::app()->createUrl("klinik/monitor", array("id"=>$data->id))'
                            ),
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
</section><!-- /.content -->