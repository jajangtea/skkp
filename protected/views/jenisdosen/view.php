<?php
/* @var $this JenisdosenController */
/* @var $model Jenisdosen */

$this->breadcrumbs=array(
	'Jenisdosens'=>array('index'),
	$model->IdJenisDosen,
);

$this->menu=array(
	array('label'=>'List Jenisdosen', 'url'=>array('index')),
	array('label'=>'Create Jenisdosen', 'url'=>array('create')),
	array('label'=>'Update Jenisdosen', 'url'=>array('update', 'id'=>$model->IdJenisDosen)),
	array('label'=>'Delete Jenisdosen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdJenisDosen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jenisdosen', 'url'=>array('admin')),
);
?>

<h1>View Jenisdosen #<?php echo $model->IdJenisDosen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdJenisDosen',
		'NamaJenis',
	),
)); ?>
