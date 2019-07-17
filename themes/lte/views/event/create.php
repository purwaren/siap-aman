<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Event'=>array('admin'),
	'Tambah'
);
$this->pageTitle = 'Tambah Event';
?>

<section class="content">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>
