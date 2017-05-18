<?php
/* @var $this SidangdetilController */
/* @var $data Sidangdetil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdSidangDetil')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdSidangDetil), array('view', 'id'=>$data->IdSidangDetil)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->IdPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Penguji1')); ?>:</b>
	<?php echo CHtml::encode($data->Penguji1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Penguji2')); ?>:</b>
	<?php echo CHtml::encode($data->Penguji2); ?>
	<br />


</div>