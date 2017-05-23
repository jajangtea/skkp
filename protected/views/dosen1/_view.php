<?php
/* @var $this DosenController */
/* @var $data Dosen */
?>

<div class="col-lg-12">
    <div class="row">
        <b><?php echo CHtml::encode($data->getAttributeLabel('KodeDosen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->KodeDosen), array('view', 'id'=>$data->KodeDosen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaDosen')); ?>:</b>
	<?php echo CHtml::encode($data->NamaDosen); ?>
	<br />
        <br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Tlp')); ?>:</b>
	<?php echo CHtml::encode($data->Tlp); ?>
	<br />
    </div>
</div>