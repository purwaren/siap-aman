<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Halaman Statis';
$this->breadcrumbs = array(
    'Halaman Statis'=>array('users/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->