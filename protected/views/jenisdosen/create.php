<?php
/* @var $this JenisdosenController */
/* @var $model Jenisdosen */

$this->breadcrumbs=array(
	'Jenisdosens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jenisdosen', 'url'=>array('index')),
	array('label'=>'Manage Jenisdosen', 'url'=>array('admin')),
);
?>

<h1>Create Jenisdosen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>