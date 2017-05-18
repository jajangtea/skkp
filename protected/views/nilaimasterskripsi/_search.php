<?php
/* @var $this NilaimasterskripsiController */
/* @var $model Nilaimasterskripsi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdNMSkripsi'); ?>
		<?php echo $form->textField($model,'IdNMSkripsi',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPendaftaran'); ?>
		<?php echo $form->textField($model,'IdPendaftaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NKompre'); ?>
		<?php echo $form->textField($model,'NKompre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NPraSidang'); ?>
		<?php echo $form->textField($model,'NPraSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NSidangSkripsi'); ?>
		<?php echo $form->textField($model,'NSidangSkripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NPembimbing'); ?>
		<?php echo $form->textField($model,'NPembimbing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NA'); ?>
		<?php echo $form->textField($model,'NA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Index'); ?>
		<?php echo $form->textField($model,'Index',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->