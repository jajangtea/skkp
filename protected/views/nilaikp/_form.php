<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nilaikp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM'); ?>
		<?php echo $form->error($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NilaiPembimbing'); ?>
		<?php echo $form->textField($model,'NilaiPembimbing'); ?>
		<?php echo $form->error($model,'NilaiPembimbing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NilaiPenguji'); ?>
		<?php echo $form->textField($model,'NilaiPenguji'); ?>
		<?php echo $form->error($model,'NilaiPenguji'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NilaiPerusahaan'); ?>
		<?php echo $form->textField($model,'NilaiPerusahaan'); ?>
		<?php echo $form->error($model,'NilaiPerusahaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NA'); ?>
		<?php echo $form->textField($model,'NA'); ?>
		<?php echo $form->error($model,'NA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Index'); ?>
		<?php echo $form->textField($model,'Index',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'Index'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->