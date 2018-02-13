<?php
/* @var $this NilaiPengujiController */
/* @var $data NilaiPenguji */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idNilaiPenguji')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idNilaiPenguji), array('view', 'id'=>$data->idNilaiPenguji)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPengujiSkripsi')); ?>:</b>
	<?php echo CHtml::encode($data->idPengujiSkripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilaiSkripsi')); ?>:</b>
	<?php echo CHtml::encode($data->nilaiSkripsi); ?>
	<br />


</div>