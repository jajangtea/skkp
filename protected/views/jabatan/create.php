<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>Jabatan Dosen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>