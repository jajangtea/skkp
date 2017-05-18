<?php
/* @var $this SidangdetilController */
/* @var $model Sidangdetil */

$this->breadcrumbs=array(
	'Sidangdetils'=>array('index'),
	$model->IdSidangDetil,
);

$this->menu=array(
	array('label'=>'List Sidangdetil', 'url'=>array('index')),
	array('label'=>'Create Sidangdetil', 'url'=>array('create')),
	array('label'=>'Update Sidangdetil', 'url'=>array('update', 'id'=>$model->IdSidangDetil)),
	array('label'=>'Delete Sidangdetil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdSidangDetil),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sidangdetil', 'url'=>array('admin')),
);
?>

<h1>View Sidangdetil #<?php echo $model->IdSidangDetil; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdSidangDetil',
		'IdPendaftaran',
		'Penguji1',
		'Penguji2',
	),
)); ?>
