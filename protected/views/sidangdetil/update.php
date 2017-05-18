<?php
/* @var $this SidangdetilController */
/* @var $model Sidangdetil */

$this->breadcrumbs=array(
	'Sidangdetils'=>array('index'),
	$model->IdSidangDetil=>array('view','id'=>$model->IdSidangDetil),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sidangdetil', 'url'=>array('index')),
	array('label'=>'Create Sidangdetil', 'url'=>array('create')),
	array('label'=>'View Sidangdetil', 'url'=>array('view', 'id'=>$model->IdSidangDetil)),
	array('label'=>'Manage Sidangdetil', 'url'=>array('admin')),
);
?>

<h1>Update Sidangdetil <?php echo $model->IdSidangDetil; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>