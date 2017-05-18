<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdSidang'); ?>
		<?php echo $form->textField($model,'IdSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDJenisSidang'); ?>
		<?php echo $form->textField($model,'IDJenisSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdTa'); ?>
		<?php echo $form->textField($model,'IdTa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->