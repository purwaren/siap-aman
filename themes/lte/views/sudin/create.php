<?php
/* @var $this Controller */
/* @var $model Sudin */


$this->pageTitle = 'Suku Dinas';
$this->breadcrumbs = array(
    'Suku Dinas'=>array('sudin/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->