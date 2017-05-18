<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sidangmaster-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
		<?php echo $form->error($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDJenisSidang'); ?>
		<?php echo $form->textField($model,'IDJenisSidang'); ?>
		<?php echo $form->error($model,'IDJenisSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdTa'); ?>
		<?php echo $form->textField($model,'IdTa'); ?>
		<?php echo $form->error($model,'IdTa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->