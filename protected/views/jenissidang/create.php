<?php
/* @var $this JenissidangController */
/* @var $model Jenissidang */

$this->breadcrumbs=array(
	'Jenissidangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jenissidang', 'url'=>array('index')),
	array('label'=>'Manage Jenissidang', 'url'=>array('admin')),
);
?>

<h1>Create Jenissidang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>