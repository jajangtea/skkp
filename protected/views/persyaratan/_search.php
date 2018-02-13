<?php
/* @var $this PersyaratanController */
/* @var $model Persyaratan */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'namaPersyaratan'); ?>
		<?php echo $form->textField($model,'namaPersyaratan',array('size'=>60,'maxlength'=>200, 'class'=>'form-control','style'=>'width:30%')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-info'),'<i class="fa fa-search"></i> Cari');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->