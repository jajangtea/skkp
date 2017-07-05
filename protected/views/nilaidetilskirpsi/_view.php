<?php
/* @var $this NilaidetilskirpsiController */
/* @var $data Nilaidetilskirpsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->IdPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NilaiPenguji1')); ?>:</b>
	<?php echo CHtml::encode($data->NilaiPenguji1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIlaiPenguji2')); ?>:</b>
	<?php echo CHtml::encode($data->NIlaiPenguji2); ?>
	<br />


</div>