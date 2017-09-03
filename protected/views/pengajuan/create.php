<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengajuan', 'url'=>array('index')),
	array('label'=>'Manage Pengajuan', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>