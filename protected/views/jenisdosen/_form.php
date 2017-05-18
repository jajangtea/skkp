<?php
/* @var $this JenisdosenController */
/* @var $model Jenisdosen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jenisdosen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdJenisDosen'); ?>
		<?php echo $form->textField($model,'IdJenisDosen',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'IdJenisDosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NamaJenis'); ?>
		<?php echo $form->textField($model,'NamaJenis',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NamaJenis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->