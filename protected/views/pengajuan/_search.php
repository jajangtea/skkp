<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
/* @var $form CActiveForm */
?>

<div class="form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'IDJenisSidang'); ?>
		<?php echo CHtml::activeDropDownList($model, 'IDJenisSidang', Pendaftaran::model()->getJenisSidangProposal(), array('prompt' => 'Pilih Proposal', 'class' => 'form-control','style'=>'width:30%'));  ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM', array('class'=>'form-control','style'=>'width:35%')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::tag('button',array('name'=>'btnSubmit','type'=>'submit','class'=>'btn btn-info'),'<i class="fa fa-search"></i> Pencarian');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->