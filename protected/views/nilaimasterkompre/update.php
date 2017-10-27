<?php
/* @var $this NilaimasterkompreController */
/* @var $model Nilaimasterskripsi */

$this->breadcrumbs=array(
	'Nilaimasterskripsis'=>array('index'),
	$model->IdNMSkripsi=>array('view','id'=>$model->IdNMSkripsi),
	'Update',
);

?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>