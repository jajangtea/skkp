<?php
/* @var $this NilaimasterkompreController */
/* @var $data Nilaimasterskripsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNMSkripsi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdNMSkripsi), array('view', 'id'=>$data->IdNMSkripsi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NKompre')); ?>:</b>
	<?php echo CHtml::encode($data->NKompre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NPraSidang')); ?>:</b>
	<?php echo CHtml::encode($data->NPraSidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NSidangSkripsi')); ?>:</b>
	<?php echo CHtml::encode($data->NSidangSkripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NPembimbing')); ?>:</b>
	<?php echo CHtml::encode($data->NPembimbing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NA')); ?>:</b>
	<?php echo CHtml::encode($data->NA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Index')); ?>:</b>
	<?php echo CHtml::encode($data->Index); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::encode($data->NIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->idPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>