<?php
/* @var $this JurusanController */
/* @var $model Jurusan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jurusan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KodeJurusan'); ?>
		<?php echo $form->textField($model,'KodeJurusan',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'KodeJurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NamaJurusan'); ?>
		<?php echo $form->textField($model,'NamaJurusan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NamaJurusan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->