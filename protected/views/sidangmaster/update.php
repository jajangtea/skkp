<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	$model->IdSidang=>array('view','id'=>$model->IdSidang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sidangmaster', 'url'=>array('index')),
	array('label'=>'Create Sidangmaster', 'url'=>array('create')),
	array('label'=>'View Sidangmaster', 'url'=>array('view', 'id'=>$model->IdSidang)),
	array('label'=>'Manage Sidangmaster', 'url'=>array('admin')),
);
?>

<h1>Update Sidangmaster <?php echo $model->IdSidang; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>