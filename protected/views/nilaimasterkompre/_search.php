<?php
/* @var $this NilaimasterkompreController */
/* @var $model Nilaimasterskripsi */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<div class="pull-right">
    <?php echo $form->textField($model, 'NIM', array('class' => 'form-control pull-right', 'style' => 'width:80%','placeholder'=>'NIM')); ?>
    <?php echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info pull-right'), '<i class="fa fa-search"></i> Cari'); ?>
</div>

<?php $this->endWidget(); ?>
