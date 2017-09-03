<?php
/* @var $this UploadController */
/* @var $data Upload */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUpload')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUpload), array('view', 'id'=>$data->idUpload)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPendaftaran')); ?>:</b>
	<?php echo CHtml::encode($data->idPendaftaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaFile')); ?>:</b>
	<?php echo CHtml::encode($data->namaFile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ukuranFIle')); ?>:</b>
	<?php echo CHtml::encode($data->ukuranFIle); ?>
	<br />


</div>