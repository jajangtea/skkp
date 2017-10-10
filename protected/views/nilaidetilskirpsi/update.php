<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilai Detil Skirpsi'=>array('index'),
	$model->idNilaiSkripsi=>array('view','id'=>$model->idNilaiSkripsi),
	'Update',
);

$this->menu=array(
//	array('label'=>'Create Nilai Detil Skirpsi', 'url'=>array('create')),
//	array('label'=>'View Nilai Detil Skirpsi', 'url'=>array('view', 'id'=>$model->idNilaiSkripsi)),
//	array('label'=>'Manage Nilai Detil Skirpsi', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>