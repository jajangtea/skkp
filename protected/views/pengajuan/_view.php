<?php
/* @var $this PengajuanController */
/* @var $data Pengajuan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPengajuan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDPengajuan), array('view', 'id'=>$data->IDPengajuan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDJenisSidang')); ?>:</b>
	<?php echo CHtml::encode($data->IDJenisSidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::encode($data->NIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalDaftar')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalDaftar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Judul')); ?>:</b>
	<?php echo CHtml::encode($data->Judul); ?>
	<br />


</div>