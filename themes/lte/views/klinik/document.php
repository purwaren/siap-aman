<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */
/* @var $photos array */
/* @var $doc BerkasAkreditasiCustom */
/* @var $sa_resume SAResumeCustom */
/* @var $pengajuan PengajuanAkreditasiCustom */

$this->pageTitle = 'Upload Dokumen Klinik';
$this->breadcrumbs = array(
    'Klinik'=>array('klinik/admin'),
    'Upload Dokumen'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formUploadDocument',array(
        'model'=>$model,
        'doc'=>$doc,
        'sa_resume'=>$sa_resume,
        'pengajuan'=>$pengajuan
    ))?>
</section><!-- /.content -->