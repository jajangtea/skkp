<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs=array(
	'Pendaftarans'=>array('index'),
	$model->idPendaftaran=>array('view','id'=>$model->idPendaftaran),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pendaftaran', 'url'=>array('index')),
	array('label'=>'Create Pendaftaran', 'url'=>array('create')),
	array('label'=>'View Pendaftaran', 'url'=>array('view', 'id'=>$model->idPendaftaran)),
	array('label'=>'Manage Pendaftaran', 'url'=>array('admin')),
);
?>

<h1>Update Pendaftaran <?php echo $model->idPendaftaran; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelMhs'=>$modelMhs)); ?>