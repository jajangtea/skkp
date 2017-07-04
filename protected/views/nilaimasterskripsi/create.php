<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Nilai Master Skripsi', 'url'=>array('admin')),
);
?>

<h1>Create Nilai Master Skripsi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>