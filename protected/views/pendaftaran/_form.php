<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pendaftaran-form',
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
		<?php echo $form->labelEx($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM'); ?>
		<?php echo $form->error($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDJenisSidang'); ?>
		<?php echo $form->textField($model,'IDJenisSidang'); ?>
		<?php echo $form->error($model,'IDJenisSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KodePembimbing1'); ?>
		<?php echo $form->textField($model,'KodePembimbing1',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'KodePembimbing1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KodePembimbing2'); ?>
		<?php echo $form->textField($model,'KodePembimbing2',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'KodePembimbing2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Judul'); ?>
		<?php echo $form->textArea($model,'Judul',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Judul'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->