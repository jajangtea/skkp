<?php
/* @var $this JabatanController */
/* @var $model Jabatan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jabatan-form',
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
		<?php echo $form->dropDownlist($model,'KodeDosen',CHtml::listData(Dosen::model()->findAll(),'KodeDosen','NamaDosen')); ?>
		<?php echo $form->error($model,'KodeDosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdJenisDosen'); ?>
                <?php echo $form->dropDownlist($model,'IdJenisDosen',CHtml::listData(Jenisdosen::model()->findAll(),'IdJenisDosen','NamaJenis')); ?>
		<?php echo $form->error($model,'IdJenisDosen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Ubah'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->