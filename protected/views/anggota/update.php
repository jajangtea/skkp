<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->nomor=>array('view','id'=>$model->nomor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'View Anggota', 'url'=>array('view', 'id'=>$model->nomor)),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>Update Anggota <?php echo $model->nomor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>