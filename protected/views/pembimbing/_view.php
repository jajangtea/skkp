<?php
/* @var $this PembimbingController */
/* @var $data Pembimbing */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPembimbing')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPembimbing), array('view', 'id'=>$data->idPembimbing)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDosen')); ?>:</b>
	<?php echo CHtml::encode($data->idDosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPengajuan')); ?>:</b>
	<?php echo CHtml::encode($data->idPengajuan); ?>
	<br />


</div>