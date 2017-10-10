<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	$model->IdSidang=>array('view','id'=>$model->IdSidang),
	'Update',
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>