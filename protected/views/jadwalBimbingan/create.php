<?php
/* @var $this JadwalBimbinganController */
/* @var $model JadwalBimbingan */

$this->breadcrumbs=array(
	'Jadwal Bimbingan'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jadwal Bimbingan', 'url'=>array('index')),
	array('label'=>'Manage Jadwal Bimbingan', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>