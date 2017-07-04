<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Nilai KP', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>