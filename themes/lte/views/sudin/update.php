<?php
/* @var $this SudinController */
/* @var $model SudinCustom */


$this->pageTitle = 'Ubah Suku Dinas';
$this->breadcrumbs = array(
    'Suku Dinas'=>array('sudin/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->