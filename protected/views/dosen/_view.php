<?php
/* @var $this DosenController */
/* @var $data Dosen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nidn')); ?>:</b>
	<?php echo CHtml::encode($data->nidn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::encode($data->nip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kewarganegaraan')); ?>:</b>
	<?php echo CHtml::encode($data->kewarganegaraan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama')); ?>:</b>
	<?php echo CHtml::encode($data->agama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nik')); ?>:</b>
	<?php echo CHtml::encode($data->nik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kabupaten')); ?>:</b>
	<?php echo CHtml::encode($data->kabupaten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_pegawai')); ?>:</b>
	<?php echo CHtml::encode($data->status_pegawai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_ikatan_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->status_ikatan_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_sk_pengangkatan')); ?>:</b>
	<?php echo CHtml::encode($data->no_sk_pengangkatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_sk_pengangkatan')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_sk_pengangkatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_masuk); ?>
	<br />

	*/ ?>

</div>