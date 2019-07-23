<?php
/* @var $this Controller */
/* @var $model KlinikCustom */
/* @var $alamat AlamatCustom */
/* @var $kontak KontakCustom */
/* @var $fasilitas FasilitasKlinikCustom */

$this->pageTitle = 'Detil Klinik: '.$model->nama;
?>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Profile Klinik</h3>
        </div>
        <div class="box-body">
            <h4><i>Informasi Umum</i></h4>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
                    'kode_klinik',
                    'nama',
                    'no_izin',
                    'kepemilikan',
                    'penanggung_jawab',
                    'karakteristik',
                    'tingkatan',
                    'created_at',
                    'created_by',
                    'updated_at',
                    'updated_by'
                ),
                'htmlOptions'=>array(
                    'class'=>'table table-hover table-striped detil-klinik'
                ),
            )); ?>
            <h4><i>Alamat Klinik</i></h4>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$alamat,
                'attributes'=>array(
                    'alamat_1',
                    'alamat_2',
                    array(
                        'name'=>'kecamatan',
                        'value'=>$alamat->getDistrict(),
                    ),
                    array(
                        'name'=>'kota',
                        'value'=>$alamat->getRegency(),
                    ),
                    array(
                        'name'=>'provinsi',
                        'value'=>$alamat->getProvince(),
                    ),
                ),
                'htmlOptions'=>array(
                    'class'=>'table table-hover table-striped detil-klinik'
                ),
            )); ?>
            <h4><i>Kontak Klinik / Media Komunikasi </i></h4>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$kontak,
                'attributes'=>array(
                    'no_telp',
                    'no_fax',
                    'email',
                    'website',
                ),
                'htmlOptions'=>array(
                    'class'=>'table table-hover table-striped detil-klinik'
                ),
            )); ?>
            <h4><i>Fasilitas yang Disediakan Klinik</i></h4>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$fasilitas,
                'attributes'=>array(
                    'qty_tempat_tidur',
                    array('name'=>'penyelenggaraan', 'value'=>$fasilitas->getPenyelenggaraan()),
                ),
                'htmlOptions'=>array(
                    'class'=>'table table-hover table-striped detil-klinik'
                ),
            )); ?>
        </div>
        <div class="box-footer">
            <a href="<?php echo Yii::app()->createUrl('klinik/admin')?>" class="btn btn-primary"> Kembali</a>
        </div>
    </div>
</section>