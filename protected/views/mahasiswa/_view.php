<?php
/* @var $this MahasiswaController */
/* @var $data Mahasiswa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NIM), array('view', 'id'=>$data->NIM)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nama')); ?>:</b>
	<?php echo CHtml::encode($data->Nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tlp')); ?>:</b>
	<?php echo CHtml::encode($data->Tlp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodeJurusan')); ?>:</b>
	<?php echo CHtml::encode($data->KodeJurusan); ?>
	<br />


</div>