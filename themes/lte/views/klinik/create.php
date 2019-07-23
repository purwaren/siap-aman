<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */


$this->pageTitle = 'Registrasi Klinik';
$this->breadcrumbs = array(
    'Klinik'=>array('klinik/admin'),
    'Registrasi'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formProfile',array('model'=>$model))?>
</section><!-- /.content -->