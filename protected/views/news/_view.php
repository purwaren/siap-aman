<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permalink')); ?>:</b>
	<?php echo CHtml::encode($data->permalink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner')); ?>:</b>
	<?php echo CHtml::encode($data->banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_published')); ?>:</b>
	<?php echo CHtml::encode($data->flag_published); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp_created')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp_updated')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_create')); ?>:</b>
	<?php echo CHtml::encode($data->user_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_update')); ?>:</b>
	<?php echo CHtml::encode($data->user_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	*/ ?>

</div>