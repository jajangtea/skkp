<?php
/* @var $this NilaimasterkompreController */
/* @var $model Nilaimasterskripsi */

$this->breadcrumbs=array(
	'Nilaimasterskripsis'=>array('index'),
	$model->IdNMSkripsi,
);

$this->menu=array(
	array('label'=>'List Nilaimasterskripsi', 'url'=>array('index')),
	array('label'=>'Create Nilaimasterskripsi', 'url'=>array('create')),
	array('label'=>'Update Nilaimasterskripsi', 'url'=>array('update', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'Delete Nilaimasterskripsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNMSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilaimasterskripsi', 'url'=>array('admin')),
);
?>

<h1>View Nilaimasterskripsi #<?php echo $model->IdNMSkripsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNMSkripsi',
		'NKompre',
		'NPraSidang',
		'NSidangSkripsi',
		'NPembimbing',
		'NA',
		'Index',
		'NIM',
		'idPendaftaran',
		'status',
	),
)); ?>
