<?php
/* @var $this DaftarController */
/* @var $data Pendaftaran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPendaftaran')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPendaftaran), array('view', 'id'=>$data->idPendaftaran)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->Tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::encode($data->NIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdSidang')); ?>:</b>
	<?php echo CHtml::encode($data->IdSidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodePembimbing1')); ?>:</b>
	<?php echo CHtml::encode($data->KodePembimbing1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodePembimbing2')); ?>:</b>
	<?php echo CHtml::encode($data->KodePembimbing2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Judul')); ?>:</b>
	<?php echo CHtml::encode($data->Judul); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>