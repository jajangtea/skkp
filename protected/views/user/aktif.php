<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

<h1>Profile #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'email',
		'joinDate',
		'level_id',
		array(
			'label'=>'Status',
			'type'=>'raw',
			'value'=>User::model()->status($model->isActive),
		),
		array(
			'label'=>'Avatar',
			'type'=>'raw',
			'value'=>Chtml::image('a/../avatar/'.$model->avatar,'DORE', array("width"=>100)),
		),
	),
)); ?>

<div class="row">
	<?php echo CHtml::hiddenField('isActive','',array('size'=>30,'maxlength'=>30)); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Aktifkan'); ?>
</div>

<?php $this->endWidget(); ?>