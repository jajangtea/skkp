<?php
/* @var $this PengujikpController */
/* @var $model Pengujikp */

$this->breadcrumbs=array(
	'Pengujikps'=>array('index'),
	$model->idPengujiKp,
);

$this->menu=array(
	array('label'=>'List Pengujikp', 'url'=>array('index')),
	array('label'=>'Create Pengujikp', 'url'=>array('create')),
	array('label'=>'Update Pengujikp', 'url'=>array('update', 'id'=>$model->idPengujiKp)),
	array('label'=>'Delete Pengujikp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPengujiKp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengujikp', 'url'=>array('admin')),
);
?>

<h1>View Pengujikp #<?php echo $model->idPengujiKp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPendaftaran0.nIM.Nama',
		'idUser0.username',
	),
)); ?>
