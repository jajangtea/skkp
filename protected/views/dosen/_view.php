<?php
/* @var $this DosenController */
/* @var $data Dosen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodeDosen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KodeDosen), array('view', 'id'=>$data->KodeDosen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaDosen')); ?>:</b>
	<?php echo CHtml::encode($data->NamaDosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tlp')); ?>:</b>
	<?php echo CHtml::encode($data->Tlp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUser')); ?>:</b>
	<?php echo CHtml::encode($data->IdUser); ?>
	<br />


</div>