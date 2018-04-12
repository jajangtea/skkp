<?php
/* @var $this JadwalBimbinganController */
/* @var $model JadwalBimbingan */

$this->breadcrumbs=array(
	'Jadwal Bimbingans'=>array('index'),
	$model->idJadwalBimbingan=>array('view','id'=>$model->idJadwalBimbingan),
	'Update',
);

$this->menu=array(
	array('label'=>'List JadwalBimbingan', 'url'=>array('index')),
	array('label'=>'Create JadwalBimbingan', 'url'=>array('create')),
	array('label'=>'View JadwalBimbingan', 'url'=>array('view', 'id'=>$model->idJadwalBimbingan)),
	array('label'=>'Manage JadwalBimbingan', 'url'=>array('admin')),
);
?>

<h1>Update JadwalBimbingan <?php echo $model->idJadwalBimbingan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>