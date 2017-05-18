<?php
/* @var $this NilaimasterskripsiController */
/* @var $model Nilaimasterskripsi */

$this->breadcrumbs=array(
	'Nilaimasterskripsis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nilaimasterskripsi', 'url'=>array('index')),
	array('label'=>'Manage Nilaimasterskripsi', 'url'=>array('admin')),
);
?>

<h1>Create Nilaimasterskripsi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>