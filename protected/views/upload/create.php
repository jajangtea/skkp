<?php
/* @var $this UploadController */
/* @var $model Upload */

$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Upload', 'url'=>array('index')),
	array('label'=>'Manage Upload', 'url'=>array('admin')),
);
?>

<h1>Upload Persyaratan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>