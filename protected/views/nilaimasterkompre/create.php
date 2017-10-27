<?php
/* @var $this NilaimasterkompreController */
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


<?php $this->renderPartial('_form', array('model'=>$model)); ?>