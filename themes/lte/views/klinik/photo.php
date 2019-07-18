<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */
/* @var $photos array */


$this->pageTitle = 'Upload Foto Klinik';
$this->breadcrumbs = array(
    'Klinik'=>array('klinik/admin'),
    'Upload Foto'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formUpload',array('model'=>$model,'photos'=>$photos))?>
</section><!-- /.content -->