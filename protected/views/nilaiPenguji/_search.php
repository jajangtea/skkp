<?php
/* @var $this NilaiPengujiController */
/* @var $model NilaiPenguji */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idNilaiPenguji'); ?>
		<?php echo $form->textField($model,'idNilaiPenguji'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPengujiSkripsi'); ?>
		<?php echo $form->textField($model,'idPengujiSkripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilaiSkripsi'); ?>
		<?php echo $form->textField($model,'nilaiSkripsi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->