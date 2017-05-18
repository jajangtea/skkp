<?php
/* @var $this JenissidangController */
/* @var $data Jenissidang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDJenisSidang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDJenisSidang), array('view', 'id'=>$data->IDJenisSidang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NamaSidang')); ?>:</b>
	<?php echo CHtml::encode($data->NamaSidang); ?>
	<br />


</div>