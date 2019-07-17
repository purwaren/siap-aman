<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Kategori';
$this->breadcrumbs = array(
    'Kategori'=>array('category/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->