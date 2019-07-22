<?php
/* @var $this Controller */
/* @var $model Sudin */


$this->pageTitle = 'Tambah Pendamping';
$this->breadcrumbs = array(
    'Pendamping'=>array('pendamping/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->