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
)); ?>

<h1>Profile #<?php echo $model->username; ?></h1>
<?php echo Chtml::link('Berikan Reputasi',array('raputation/create','id'=>$model->id),
	array('class'=>'btn success')) ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'email',
		'joinDate',
		'level_id',
		array(
			'label'=>'Avatar',
			'type'=>'raw',
			'value'=>Chtml::image('a/../avatar/'.$model->avatar,'DORE', array("width"=>100)),
		),
	),
)); ?>
Reputasi :
<?php echo Raputation::model()->reput($model->id) ?>

<?php $this->endWidget(); ?>