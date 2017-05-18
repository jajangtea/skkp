<?php
/* @var $this SidangdetilController */
/* @var $model Sidangdetil */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdSidangDetil'); ?>
		<?php echo $form->textField($model,'IdSidangDetil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPendaftaran'); ?>
		<?php echo $form->textField($model,'IdPendaftaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Penguji1'); ?>
		<?php echo $form->textField($model,'Penguji1',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Penguji2'); ?>
		<?php echo $form->textField($model,'Penguji2',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->