<?php
/* @var $this PengujiskripsiController */
/* @var $model Pengujiskripsi */

$this->breadcrumbs=array(
	'Pengujiskripsis'=>array('index'),
	$model->idPengujiSkripsi,
);

$this->menu=array(
	array('label'=>'List Pengujiskripsi', 'url'=>array('index')),
	array('label'=>'Create Pengujiskripsi', 'url'=>array('create')),
	array('label'=>'Update Pengujiskripsi', 'url'=>array('update', 'id'=>$model->idPengujiSkripsi)),
	array('label'=>'Delete Pengujiskripsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPengujiSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengujiskripsi', 'url'=>array('admin')),
);
?>

<h1>View Pengujiskripsi #<?php echo $model->idPengujiSkripsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPengujiSkripsi',
		'idPendaftaran',
		'idUser',
	),
)); ?>
