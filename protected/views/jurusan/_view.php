<?php
/* @var $this JurusanController */
/* @var $data Jurusan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('KodeJurusan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KodeJurusan), array('view', 'id'=>$data->KodeJurusan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaJurusan')); ?>:</b>
	<?php echo CHtml::encode($data->NamaJurusan); ?>
	<br />


</div>