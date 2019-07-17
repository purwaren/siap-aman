<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Artikel';
$this->breadcrumbs = array(
    'Artikel'=>array('news/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->