<?php
/* @var $this PersyaratanController */
/* @var $model Persyaratan */

$this->breadcrumbs=array(
	'Persyaratans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Persyaratan', 'url'=>array('index')),
	array('label'=>'Manage Persyaratan', 'url'=>array('admin')),
);
?>

<h1>Tambah Syarat</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>