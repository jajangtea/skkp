<?php
/* @var $this PengujikpController */
/* @var $model Pengujikp */

$this->breadcrumbs=array(
	'Pengujikps'=>array('index'),
	$model->idPengujiKp=>array('view','id'=>$model->idPengujiKp),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengujikp', 'url'=>array('index')),
	array('label'=>'Create Pengujikp', 'url'=>array('create')),
	array('label'=>'View Pengujikp', 'url'=>array('view', 'id'=>$model->idPengujiKp)),
	array('label'=>'Manage Pengujikp', 'url'=>array('admin')),
);
?>

<h1>Update Pengujikp <?php echo $model->idPengujiKp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>