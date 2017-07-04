<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	$model->IdNMSkripsi=>array('view','id'=>$model->IdNMSkripsi),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Nilai Master Skripsi', 'url'=>array('create')),
	array('label'=>'View Nilai Master Skripsi', 'url'=>array('view', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'Manage Nilai Master Skripsi', 'url'=>array('admin')),
);
?>

<h1>Update Nilai Master Skripsi <?php echo $model->IdNMSkripsi; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>