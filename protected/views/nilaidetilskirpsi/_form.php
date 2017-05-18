<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nilaidetilskirpsi-form',
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
		<?php echo $form->labelEx($model,'NilaiPenguji1'); ?>
		<?php echo $form->textField($model,'NilaiPenguji1'); ?>
		<?php echo $form->error($model,'NilaiPenguji1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NIlaiPenguji2'); ?>
		<?php echo $form->textField($model,'NIlaiPenguji2'); ?>
		<?php echo $form->error($model,'NIlaiPenguji2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->