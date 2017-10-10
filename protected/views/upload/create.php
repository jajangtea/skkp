<?php
/* @var $this UploadController */
/* @var $model Upload */

$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Upload', 'url'=>array('index')),
//	array('label'=>'Manage Upload', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>