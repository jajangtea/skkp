<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->nomor,
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'Update Anggota', 'url'=>array('update', 'id'=>$model->nomor)),
	array('label'=>'Delete Anggota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nomor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>View Anggota #<?php echo $model->nomor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nomor',
		'nama',
		'email',
		'alamat',
		'kota',
	),
)); ?>
