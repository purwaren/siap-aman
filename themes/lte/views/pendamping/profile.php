<?php
/* @var $this Controller */
/* @var $model Sudin */


$this->pageTitle = 'Update Profile Pendamping';
$this->breadcrumbs = array(
    'Pendamping'=>array('pendamping/admin'),
    'Update Profile'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formProfile',array('model'=>$model))?>
</section><!-- /.content -->