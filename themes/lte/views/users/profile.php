<?php
/* @var $this Controller */
/* @var $model Users */

$this->pageTitle = 'Update Profile Pengguna';
$this->breadcrumbs = array(
    'Pengguna'=>array('users/admin'),
    'Tambah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formProfile',array('model'=>$model))?>
</section><!-- /.content -->