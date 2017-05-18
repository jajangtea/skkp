<?php
/* @var $this JabatanController */
/* @var $data Jabatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdJabatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdJabatan), array('view', 'id'=>$data->IdJabatan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodeDosen')); ?>:</b>
	<?php echo CHtml::encode($data->KodeDosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdJenisDosen')); ?>:</b>
	<?php echo CHtml::encode($data->IdJenisDosen); ?>
	<br />


</div>