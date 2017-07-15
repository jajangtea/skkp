<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs=array(
	'Pendaftarans'=>array('index'),
	$model->idPendaftaran=>array('view','id'=>$model->idPendaftaran),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-bars"></i><span>Daftar</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-eyes"></i><span>view</span>', 'url'=>array('view', 'id'=>$model->idPendaftaran)),
);
?>

<h1>Update Pendaftaran <?php echo $model->idPendaftaran; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelMhs'=>$modelMhs)); ?>