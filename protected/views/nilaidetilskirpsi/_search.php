<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idNilaiSkripsi'); ?>
		<?php echo $form->textField($model,'idNilaiSkripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPendaftaran'); ?>
		<?php echo $form->textField($model,'IdPendaftaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NilaiPenguji1'); ?>
		<?php echo $form->textField($model,'NilaiPenguji1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NIlaiPenguji2'); ?>
		<?php echo $form->textField($model,'NIlaiPenguji2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->