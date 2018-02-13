<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'Pembimbing'); ?>
		 <?php echo $form->dropDownList($model, 'idDosen' ,CHtml::listData(Dosen::model()->findAll("KodeDosen <> '--'"), 'IdUser', 'NamaDosen'),array('prompt' => 'Pilih Sidang', 'class' => 'form-control')); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->label($model,'idPengajuan'); ?>
		<?php // echo $form->textField($model,'idPengajuan', array('class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-info'),'<i class="fa fa-search"></i> Pencarian');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->