<?php
/* @var $this PersyaratanJenisController */
/* @var $model PersyaratanJenis */

$this->breadcrumbs=array(
	'Persyaratan Jenises'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PersyaratanJenis', 'url'=>array('index')),
	array('label'=>'Kelola Jenis Persyaratan', 'url'=>array('admin')),
);
?>

<h3>Tambah Jenis Persyaratan</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>