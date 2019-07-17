<?php
/* @var $this Controller */
$this->pageTitle = 'Ganti Password';
$this->breadcrumbs = array(
    'Pengguna'=>array('#'),
    'Ganti Password'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_formPassword',array('model'=>$model))?>
</section><!-- /.content -->