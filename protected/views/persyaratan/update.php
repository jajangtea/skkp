<?php
/* @var $this PersyaratanController */
/* @var $model Persyaratan */

$this->breadcrumbs=array(
	'Persyaratans'=>array('index'),
	$model->idPersyaratan=>array('view','id'=>$model->idPersyaratan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Persyaratan', 'url'=>array('index')),
	array('label'=>'Create Persyaratan', 'url'=>array('create')),
	array('label'=>'View Persyaratan', 'url'=>array('view', 'id'=>$model->idPersyaratan)),
	array('label'=>'Manage Persyaratan', 'url'=>array('admin')),
);
?>
<hr/>
<h1>Update Persyaratan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>