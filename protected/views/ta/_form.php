<?php
/* @var $this TaController */
/* @var $model Ta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Tahun'); ?>
		<?php echo $form->textField($model,'Tahun',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Semester'); ?>
		<?php echo $form->textField($model,'Semester',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Semester'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->