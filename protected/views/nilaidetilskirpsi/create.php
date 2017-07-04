<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilai Detil Skirpsi'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Nilai detil Skirpsi', 'url'=>array('admin')),
);
?>

<h1>Create Nilai detil Skirpsi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>