<?php
/* @var $this PengujikpController */
/* @var $model Pengujikp */

$this->breadcrumbs=array(
	'Pengujikps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengujikp', 'url'=>array('index')),
	array('label'=>'Manage Pengujikp', 'url'=>array('admin')),
);
?>

<br/>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
 
$this->renderPartial('admin_id', array('model'=>$model,'id'=>$id)); ?>
