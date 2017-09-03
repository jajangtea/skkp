<?php
/* @var $this UploadProposalController */
/* @var $model UploadProposal */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'idUpload'); ?>
		<?php echo $form->textField($model,'idUpload', array('class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'idPengajuan'); ?>
		<?php echo $form->textField($model,'idPengajuan', array('class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'namaFile'); ?>
		<?php echo $form->textField($model,'namaFile',array('size'=>60,'maxlength'=>300, 'class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'ukuranFIle'); ?>
		<?php echo $form->textField($model,'ukuranFIle',array('size'=>60,'maxlength'=>300, 'class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'idPersyaratan'); ?>
		<?php echo $form->textField($model,'idPersyaratan', array('class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-info'),'<i class="fa fa-search"></i> Save');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->