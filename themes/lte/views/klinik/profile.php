<?php
/* @var $this KlinikController */
/* @var $model KlinikUpdateForm */


$this->pageTitle = 'Update Profile Klinik';
$this->breadcrumbs = array(
    'Klinik'=>array('klinik/admin'),
    'Update Profile'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formProfile',array('model'=>$model))?>
</section><!-- /.content -->