<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdNilaiKp'); ?>
		<?php echo $form->textField($model,'IdNilaiKp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NilaiPembimbing'); ?>
		<?php echo $form->textField($model,'NilaiPembimbing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NilaiPenguji'); ?>
		<?php echo $form->textField($model,'NilaiPenguji'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NilaiPerusahaan'); ?>
		<?php echo $form->textField($model,'NilaiPerusahaan'); ?>
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