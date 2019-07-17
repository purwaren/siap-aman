<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('admin'),
	'Ubah',
);

$this->pageTitle = 'Ubah Event'
?>
<section class="content">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>
