<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilaidetilskirpsis'=>array('index'),
	$model->idNilaiSkripsi,
);

$this->menu=array(
	array('label'=>'List Nilaidetilskirpsi', 'url'=>array('index')),
	array('label'=>'Create Nilaidetilskirpsi', 'url'=>array('create')),
	array('label'=>'Update Nilaidetilskirpsi', 'url'=>array('update', 'id'=>$model->idNilaiSkripsi)),
	array('label'=>'Delete Nilaidetilskirpsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idNilaiSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilaidetilskirpsi', 'url'=>array('admin')),
);
?>

<h1>View Nilaidetilskirpsi #<?php echo $model->idNilaiSkripsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idNilaiSkripsi',
		'IdPendaftaran',
		'NilaiPenguji1',
		'NIlaiPenguji2',
	),
)); ?>
