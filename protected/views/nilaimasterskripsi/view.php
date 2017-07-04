<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	$model->IdNMSkripsi,
);

$this->menu=array(
	array('label'=>'Create Nilai Master Skripsi', 'url'=>array('create')),
	array('label'=>'Update Nilai Master Skripsi', 'url'=>array('update', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'Delete Nilai Master Skripsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNMSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilai Master Skripsi', 'url'=>array('admin')),
);
?>

<h1>View Nilai Master Skripsi #<?php echo $model->IdNMSkripsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNMSkripsi',
		'IdPendaftaran',
		'NKompre',
		'NPraSidang',
		'NSidangSkripsi',
		'NPembimbing',
		'NA',
		'Index',
	),
)); ?>
