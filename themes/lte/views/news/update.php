<?php
/* @var $this Controller */
$this->pageTitle = 'Ubah Artikel';
$this->breadcrumbs = array(
    'Artikel'=>array('news/admin'),
    'Ubah'
);
?>
<!-- Main content -->
<section class="content">
    <?php $this->renderPartial('_form',array('model'=>$model))?>
</section><!-- /.content -->