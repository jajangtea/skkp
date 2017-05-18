<?php
/* @var $this TaController */
/* @var $data Ta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdTa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdTa), array('view', 'id'=>$data->IdTa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tahun')); ?>:</b>
	<?php echo CHtml::encode($data->Tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Semester')); ?>:</b>
	<?php echo CHtml::encode($data->Semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>