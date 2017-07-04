<?php
/* @var $this TaController */
/* @var $model Ta */

$this->breadcrumbs=array(
	'TA'=>array('index'),
	$model->IdTa,
);

$this->menu=array(
	array('label'=>'Create TA', 'url'=>array('create')),
	array('label'=>'Update TA', 'url'=>array('update', 'id'=>$model->IdTa)),
	array('label'=>'Delete TA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdTa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TA', 'url'=>array('admin')),
);
?>

<h1>View TA #<?php echo $model->IdTa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdTa',
		'Tahun',
		'Semester',
	),
)); ?>
