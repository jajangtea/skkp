<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->KodeDosen,
);

$this->menu=array(
	array('label'=>'List Dosen', 'url'=>array('index')),
	array('label'=>'Create Dosen', 'url'=>array('create')),
	array('label'=>'Update Dosen', 'url'=>array('update', 'id'=>$model->KodeDosen)),
	array('label'=>'Delete Dosen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KodeDosen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>View Dosen #<?php echo $model->KodeDosen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KodeDosen',
		'NamaDosen',
		'Tlp',
	),
)); ?>
