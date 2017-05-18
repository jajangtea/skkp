<?php
/* @var $this JenissidangController */
/* @var $model Jenissidang */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDJenisSidang'); ?>
		<?php echo $form->textField($model,'IDJenisSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NamaSidang'); ?>
		<?php echo $form->textField($model,'NamaSidang',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->