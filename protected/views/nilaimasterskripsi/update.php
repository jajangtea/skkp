<?php
/* @var $this NilaimasterskripsiController */
/* @var $model Nilaimasterskripsi */

$this->breadcrumbs=array(
	'Nilaimasterskripsis'=>array('index'),
	$model->IdNMSkripsi=>array('view','id'=>$model->IdNMSkripsi),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nilaimasterskripsi', 'url'=>array('index')),
	array('label'=>'Create Nilaimasterskripsi', 'url'=>array('create')),
	array('label'=>'View Nilaimasterskripsi', 'url'=>array('view', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'Manage Nilaimasterskripsi', 'url'=>array('admin')),
);
?>

<h1>Update Nilaimasterskripsi <?php echo $model->IdNMSkripsi; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>