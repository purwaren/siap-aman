<?php
/* @var $this Controller */
$this->pageTitle = 'Ubah Dosen';
$this->breadcrumbs = array(
    'Kategori'=>array('dosen/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->