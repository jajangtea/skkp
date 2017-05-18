<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	$model->IdNilaiKp=>array('view','id'=>$model->IdNilaiKp),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nilaikp', 'url'=>array('index')),
	array('label'=>'Create Nilaikp', 'url'=>array('create')),
	array('label'=>'View Nilaikp', 'url'=>array('view', 'id'=>$model->IdNilaiKp)),
	array('label'=>'Manage Nilaikp', 'url'=>array('admin')),
);
?>

<h1>Update Nilaikp <?php echo $model->IdNilaiKp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>