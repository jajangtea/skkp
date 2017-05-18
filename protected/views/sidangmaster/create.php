<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sidangmaster', 'url'=>array('index')),
	array('label'=>'Manage Sidangmaster', 'url'=>array('admin')),
);
?>

<h1>Create Sidangmaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>