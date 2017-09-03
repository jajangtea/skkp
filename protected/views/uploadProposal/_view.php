<?php
/* @var $this UploadProposalController */
/* @var $data UploadProposal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUpload')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUpload), array('view', 'id'=>$data->idUpload)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPengajuan')); ?>:</b>
	<?php echo CHtml::encode($data->idPengajuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaFile')); ?>:</b>
	<?php echo CHtml::encode($data->namaFile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ukuranFIle')); ?>:</b>
	<?php echo CHtml::encode($data->ukuranFIle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersyaratan')); ?>:</b>
	<?php echo CHtml::encode($data->idPersyaratan); ?>
	<br />


</div>