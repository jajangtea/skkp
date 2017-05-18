<?php
/* @var $this SidangdetilController */
/* @var $model Sidangdetil */

$this->breadcrumbs=array(
	'Sidangdetils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sidangdetil', 'url'=>array('index')),
	array('label'=>'Manage Sidangdetil', 'url'=>array('admin')),
);
?>

<h1>Create Sidangdetil</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>