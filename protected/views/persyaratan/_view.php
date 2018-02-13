<?php
/* @var $this PersyaratanController */
/* @var $data Persyaratan */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('namaPersyaratan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->namaPersyaratan), array('view', 'id'=>$data->idPersyaratan)); ?>
	<br />


</div>