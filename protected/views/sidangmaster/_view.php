<?php
/* @var $this SidangmasterController */
/* @var $data Sidangmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdSidang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdSidang), array('view', 'id'=>$data->IdSidang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->Tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDJenisSidang')); ?>:</b>
	<?php echo CHtml::encode($data->IDJenisSidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTa')); ?>:</b>
	<?php echo CHtml::encode($data->IdTa); ?>
	<br />


</div>