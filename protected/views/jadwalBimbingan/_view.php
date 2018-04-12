<?php
/* @var $this JadwalBimbinganController */
/* @var $data JadwalBimbingan */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?>:</b>
	<?php echo CHtml::encode($data->hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam')); ?>:</b>
	<?php echo CHtml::encode($data->jam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodeDosen')); ?>:</b>
	<?php echo CHtml::encode($data->KodeDosen); ?>
	<br />


</div>