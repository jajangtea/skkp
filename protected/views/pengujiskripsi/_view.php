<?php
/* @var $this PengujiskripsiController */
/* @var $data Pengujiskripsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPengujiSkripsi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPengujiSkripsi), array('view', 'id'=>$data->idPengujiSkripsi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->idPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUser')); ?>:</b>
	<?php echo CHtml::encode($data->idUser); ?>
	<br />


</div>