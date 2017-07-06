<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosen'=>array('index'),
	$model->KodeDosen=>array('view','id'=>$model->KodeDosen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dosen', 'url'=>array('index')),
	array('label'=>'Create Dosen', 'url'=>array('create')),
	array('label'=>'View Dosen', 'url'=>array('view', 'id'=>$model->KodeDosen)),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form_', array('model'=>$model)); ?>