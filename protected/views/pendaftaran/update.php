<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs=array(
	'Pendaftarans'=>array('index'),
	$model->idPendaftaran=>array('view','id'=>$model->idPendaftaran),
	'Update',
);

?>

<h1>Update Pendaftaran <?php echo $model->idPendaftaran; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelMhs'=>$modelMhs)); ?>