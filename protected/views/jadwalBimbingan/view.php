<?php
/* @var $this JadwalBimbinganController */
/* @var $model JadwalBimbingan */

$this->breadcrumbs=array(
	'Jadwal Bimbingans'=>array('index'),
	$model->idJadwalBimbingan,
);

$this->menu=array(
	array('label'=>'List Jadwal Bimbingan', 'url'=>array('index')),
	array('label'=>'Create Jadwal Bimbingan', 'url'=>array('create')),
	array('label'=>'Update Jadwal Bimbingan', 'url'=>array('update', 'id'=>$model->idJadwalBimbingan)),
	array('label'=>'Delete Jadwal Bimbingan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idJadwalBimbingan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jadwal Bimbingan', 'url'=>array('admin')),
);
?>

<h1>View Jadwal Bimbingan #<?php echo $model->idJadwalBimbingan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hari',
		'jam',
		'kodeDosen.NamaDosen',
	),
)); ?>
