<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nilaikp', 'url'=>array('index')),
	array('label'=>'Manage Nilaikp', 'url'=>array('admin')),
);
?>

<h1>Create Nilaikp</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>