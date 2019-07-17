<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Gallery';
$this->breadcrumbs = array(
    'Gallery'=>array('category/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->