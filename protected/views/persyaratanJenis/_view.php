<?php
/* @var $this PersyaratanJenisController */
/* @var $data PersyaratanJenis */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersyaratanJenis')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPersyaratanJenis), array('view', 'id'=>$data->idPersyaratanJenis)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idJenisSidang')); ?>:</b>
	<?php echo CHtml::encode($data->idJenisSidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersyaratan')); ?>:</b>
	<?php echo CHtml::encode($data->idPersyaratan); ?>
	<br />


</div>