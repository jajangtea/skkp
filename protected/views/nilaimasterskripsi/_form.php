<?php
/* @var $this NilaimasterskripsiController */
/* @var $model Nilaimasterskripsi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nilaimasterskripsi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdPendaftaran'); ?>
		<?php echo $form->textField($model,'IdPendaftaran'); ?>
		<?php echo $form->error($model,'IdPendaftaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NKompre'); ?>
		<?php echo $form->textField($model,'NKompre'); ?>
		<?php echo $form->error($model,'NKompre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NPraSidang'); ?>
		<?php echo $form->textField($model,'NPraSidang'); ?>
		<?php echo $form->error($model,'NPraSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NSidangSkripsi'); ?>
		<?php echo $form->textField($model,'NSidangSkripsi'); ?>
		<?php echo $form->error($model,'NSidangSkripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NPembimbing'); ?>
		<?php echo $form->textField($model,'NPembimbing'); ?>
		<?php echo $form->error($model,'NPembimbing'); ?>
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