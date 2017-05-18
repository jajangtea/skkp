<?php
/* @var $this JenisdosenController */
/* @var $data Jenisdosen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdJenisDosen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdJenisDosen), array('view', 'id'=>$data->IdJenisDosen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaJenis')); ?>:</b>
	<?php echo CHtml::encode($data->NamaJenis); ?>
	<br />


</div>