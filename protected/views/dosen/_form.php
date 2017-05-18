<?php
/* @var $this DosenController */
/* @var $model Dosen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dosen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KodeDosen'); ?>
		<?php echo $form->textField($model,'KodeDosen',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'KodeDosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NamaDosen'); ?>
		<?php echo $form->textField($model,'NamaDosen',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'NamaDosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tlp'); ?>
		<?php echo $form->textField($model,'Tlp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Tlp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->