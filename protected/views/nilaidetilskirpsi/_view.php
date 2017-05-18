<?php
/* @var $this NilaidetilskirpsiController */
/* @var $data Nilaidetilskirpsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idNilaiSkripsi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idNilaiSkripsi), array('view', 'id'=>$data->idNilaiSkripsi)); ?>
	<br />

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