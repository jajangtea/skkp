<?php
/* @var $this JenissidangController */
/* @var $model Jenissidang */

$this->breadcrumbs=array(
	'Jenissidangs'=>array('index'),
	$model->IDJenisSidang=>array('view','id'=>$model->IDJenisSidang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jenissidang', 'url'=>array('index')),
	array('label'=>'Create Jenissidang', 'url'=>array('create')),
	array('label'=>'View Jenissidang', 'url'=>array('view', 'id'=>$model->IDJenisSidang)),
	array('label'=>'Manage Jenissidang', 'url'=>array('admin')),
);
?>

<h1>Update Jenissidang <?php echo $model->IDJenisSidang; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>