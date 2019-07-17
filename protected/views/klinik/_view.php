<?php
/* @var $this KlinikController */
/* @var $data Klinik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_klinik')); ?>:</b>
	<?php echo CHtml::encode($data->kode_klinik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_izin')); ?>:</b>
	<?php echo CHtml::encode($data->no_izin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kepemilikan')); ?>:</b>
	<?php echo CHtml::encode($data->kepemilikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penanggung_jawab')); ?>:</b>
	<?php echo CHtml::encode($data->penanggung_jawab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('karakteristik')); ?>:</b>
	<?php echo CHtml::encode($data->karakteristik); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tingkatan')); ?>:</b>
	<?php echo CHtml::encode($data->tingkatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>