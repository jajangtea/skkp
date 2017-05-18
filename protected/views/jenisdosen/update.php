<?php
/* @var $this JenisdosenController */
/* @var $model Jenisdosen */

$this->breadcrumbs=array(
	'Jenisdosens'=>array('index'),
	$model->IdJenisDosen=>array('view','id'=>$model->IdJenisDosen),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jenisdosen', 'url'=>array('index')),
	array('label'=>'Create Jenisdosen', 'url'=>array('create')),
	array('label'=>'View Jenisdosen', 'url'=>array('view', 'id'=>$model->IdJenisDosen)),
	array('label'=>'Manage Jenisdosen', 'url'=>array('admin')),
);
?>

<h1>Update Jenisdosen <?php echo $model->IdJenisDosen; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>