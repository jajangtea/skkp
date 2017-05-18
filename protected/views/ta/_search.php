<?php
/* @var $this TaController */
/* @var $model Ta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdTa'); ?>
		<?php echo $form->textField($model,'IdTa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tahun'); ?>
		<?php echo $form->textField($model,'Tahun',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Semester'); ?>
		<?php echo $form->textField($model,'Semester',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->