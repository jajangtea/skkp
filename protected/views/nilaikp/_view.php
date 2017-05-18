<?php
/* @var $this NilaikpController */
/* @var $data Nilaikp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNilaiKp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdNilaiKp), array('view', 'id'=>$data->IdNilaiKp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::encode($data->NIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NilaiPembimbing')); ?>:</b>
	<?php echo CHtml::encode($data->NilaiPembimbing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NilaiPenguji')); ?>:</b>
	<?php echo CHtml::encode($data->NilaiPenguji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NilaiPerusahaan')); ?>:</b>
	<?php echo CHtml::encode($data->NilaiPerusahaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NA')); ?>:</b>
	<?php echo CHtml::encode($data->NA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Index')); ?>:</b>
	<?php echo CHtml::encode($data->Index); ?>
	<br />


</div>