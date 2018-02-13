<?php
/* @var $this PersyaratanJenisController */
/* @var $model PersyaratanJenis */

$this->breadcrumbs=array(
	'Persyaratan Jenises'=>array('index'),
	$model->idPersyaratanJenis=>array('view','id'=>$model->idPersyaratanJenis),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Jenis Persyaratan', 'url'=>array('index')),
	array('label'=>'Tambah Jenis Persyaratan', 'url'=>array('create')),
	array('label'=>'Tampil Jenis Persyaratan', 'url'=>array('view', 'id'=>$model->idPersyaratanJenis)),
	array('label'=>'Kelola Jenis Persyaratan', 'url'=>array('admin')),
);
?>

<h1>Ubah Jenis Persyaratan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>