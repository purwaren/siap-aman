<?php
/* @var $this AkreditasiController */
/* @var $data PengajuanAkreditasiCustom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_klinik')); ?>:</b>
	<?php echo CHtml::encode($data->id_klinik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_urut')); ?>:</b>
	<?php echo CHtml::encode($data->no_urut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pengajuan')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pengajuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_pengajuan')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_pengajuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penetapan')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penetapan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>