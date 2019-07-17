<?php
/* @var $this Controller */
$this->pageTitle = 'Ubah Pengguna';
$this->breadcrumbs = array(
    'Pengguna'=>array('users/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->