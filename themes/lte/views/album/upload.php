<?php
/* @var $this Controller */
/* @var $album Album */

$this->pageTitle = $album->name.' - Upload';
$this->breadcrumbs = array(
    'Gallery'=>array('category/admin'),
    'Upload'
);
?>
<!-- Main content -->
<section class="content">
    <?php
        if($album->type == Album::TYPE_PICTURE) {
            $this->renderPartial('_uploadImage', array('model' => $model, 'album' => $album));
        }
        else {
            $this->renderPartial('_uploadVideo', array('model' => $model2, 'album' => $album));
        }
    ?>
</section><!-- /.content -->