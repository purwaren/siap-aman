<?php
/* @var $this Controller */
$this->pageTitle = 'Tambah Pengguna';
$this->breadcrumbs = array(
    'Pengguna'=>array('users/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->