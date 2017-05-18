<?php
/* @var $this JenissidangController */
/* @var $model Jenissidang */

$this->breadcrumbs=array(
	'Jenissidangs'=>array('index'),
	$model->IDJenisSidang,
);

$this->menu=array(
	array('label'=>'List Jenissidang', 'url'=>array('index')),
	array('label'=>'Create Jenissidang', 'url'=>array('create')),
	array('label'=>'Update Jenissidang', 'url'=>array('update', 'id'=>$model->IDJenisSidang)),
	array('label'=>'Delete Jenissidang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDJenisSidang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jenissidang', 'url'=>array('admin')),
);
?>

<h1>View Jenissidang #<?php echo $model->IDJenisSidang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDJenisSidang',
		'NamaSidang',
	),
)); ?>
