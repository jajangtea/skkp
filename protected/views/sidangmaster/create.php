<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Sidang', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>