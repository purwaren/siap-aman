<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Dosen';
$this->breadcrumbs = array(
    'Kategori'=>array('dosen/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->