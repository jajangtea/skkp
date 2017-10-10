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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>