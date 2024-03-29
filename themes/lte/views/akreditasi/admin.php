<?php
/* @var $this Controller */
/* @var $model PengajuanAkreditasiCustom */

if ($model->status < StatusPengajuan::REKOMENDASI) {
    $this->pageTitle = 'Kelola Usulan Akreditasi';
} else {
    $this->pageTitle = 'Kelola Hasil Akreditasi';
}
$this->breadcrumbs = array(
    'Akreditasi'
);

Yii::app()->clientScript->registerScript('search', "
$('#search-form').submit(function(){
	$('#pengajuan-akreditasi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<!-- Main content -->
<section class="content">
    <div class="box box-default collapsed-box">
        <div class="box-header">
            <h3 class="box-title"><a href="#" data-widget="collapse">Advance Search</a></h3>
        </div>
        <?php $this->renderPartial('_search',array('model'=>$model))?>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><small>Daftar usulan akreditasi yang perlu untuk diproses</small></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'pengajuan-akreditasi-grid',
                'dataProvider'=>$model->search(),
                //'filter'=>$model,
                'columns'=>array(
                    'no_urut',
                    'idKlinik.kode_klinik',
                    'idKlinik.nama',
                    array(
                        'name'=>'tgl_pengajuan',
                        'value'=>'DateUtil::dateToString($data->tgl_pengajuan)',
                        'visible'=>$model->status < StatusPengajuan::REKOMENDASI
                    ),
                    array(
                        'name'=>'tgl_penetapan',
                        'value'=>'DateUtil::dateToString($data->tgl_penetapan)',
                        'visible'=>$model->status >= StatusPengajuan::REKOMENDASI
                    ),
                    array(
                        'name'=>'jenis_pengajuan',
                        'value'=>'ucfirst($data->jenis_pengajuan)',
                        'visible'=>$model->status < StatusPengajuan::REKOMENDASI
                    ),
                    array(
                        'name'=>'hasil',
                        'value'=>'ucfirst($data->idKlinik->tingkatan)',
                        'visible'=>$model->status >= StatusPengajuan::REKOMENDASI
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-search"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-primary','title'=>'Detail Usulan','data-toggle'=>'tooltip')
                            ),
                            'update'=>array(
                                'label'=>'<i class="fa fa-edit"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-warning','title'=>'Ubah','data-toggle'=>'tooltip')
                            ),
                            'delete'=>array(
                                'label'=>'<i class="fa fa-trash"></i>',
                                'imageUrl'=>false,
                                'options'=>array('class'=>'btn btn-xs btn-danger','title'=>'Hapus','data-toggle'=>'tooltip'),
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
        <div class="box-footer">
            <?php echo CHtml::linkButton('Print', array('class'=>'btn btn-primary','href'=>Yii::app()->createUrl('akreditasi/print'),'target'=>'_blank'))?>
            <?php echo CHtml::linkButton('Download', array('class'=>'btn btn-success','href'=>Yii::app()->createUrl('akreditasi/download')))?>
        </div>
    </div><!-- /.box -->
</section><!-- /.content -->