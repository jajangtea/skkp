<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilaidetilskirpsis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nilaidetilskirpsi', 'url'=>array('index')),
	array('label'=>'Manage Nilaidetilskirpsi', 'url'=>array('admin')),
);
?>

<h1>Create Nilaidetilskirpsi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>