<?php
/* @var $this Controller */
$this->pageTitle = 'Ubah Halaman Statis';
$this->breadcrumbs = array(
    'Halaman Statis'=>array('page/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->