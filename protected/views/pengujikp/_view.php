<?php
/* @var $this PengujikpController */
/* @var $data Pengujikp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPengujiKp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPengujiKp), array('view', 'id'=>$data->idPengujiKp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->idPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUser')); ?>:</b>
	<?php echo CHtml::encode($data->idUser); ?>
	<br />


</div>