<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idPendaftaran'); ?>
		<?php echo $form->textField($model,'idPendaftaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDJenisSidang'); ?>
		<?php echo $form->textField($model,'IDJenisSidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KodePembimbing1'); ?>
		<?php echo $form->textField($model,'KodePembimbing1',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KodePembimbing2'); ?>
		<?php echo $form->textField($model,'KodePembimbing2',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Judul'); ?>
		<?php echo $form->textArea($model,'Judul',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->