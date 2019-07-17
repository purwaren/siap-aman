<?php
/* @var $this Controller */
$this->pageTitle = 'Ubah Kategori';
$this->breadcrumbs = array(
    'Kategori'=>array('category/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->