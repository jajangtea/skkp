<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	$model->IdSidang,
);

$this->menu=array(
	array('label'=>'List Sidangmaster', 'url'=>array('index')),
	array('label'=>'Create Sidangmaster', 'url'=>array('create')),
	array('label'=>'Update Sidangmaster', 'url'=>array('update', 'id'=>$model->IdSidang)),
	array('label'=>'Delete Sidangmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdSidang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sidangmaster', 'url'=>array('admin')),
);
?>

<h1>View Sidangmaster #<?php echo $model->IdSidang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdSidang',
		'Tanggal',
		'IDJenisSidang',
		'IdTa',
	),
)); ?>
