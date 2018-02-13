<?php
/* @var $this PersyaratanController */
/* @var $model Persyaratan */

$this->breadcrumbs=array(
	'Persyaratan'=>array('index'),
	$model->idPersyaratan,
);

$this->menu=array(
	array('label'=>'List Persyaratan', 'url'=>array('index')),
	array('label'=>'Create Persyaratan', 'url'=>array('create')),
	array('label'=>'Update Persyaratan', 'url'=>array('update', 'id'=>$model->idPersyaratan)),
	array('label'=>'Delete Persyaratan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPersyaratan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Persyaratan', 'url'=>array('admin')),
);
?>
<hr/>
<h1>View Persyaratan #<?php echo $model->idPersyaratan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'namaPersyaratan',
	),
)); ?>
