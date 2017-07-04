<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilaidetilskirpsis'=>array('index'),
	$model->idNilaiSkripsi,
);

$this->menu=array(
	array('label'=>'Create Nilai Detil Skirpsi', 'url'=>array('create')),
	array('label'=>'Update Nilai Detil Skirpsi', 'url'=>array('update', 'id'=>$model->idNilaiSkripsi)),
	array('label'=>'Delete Nilai Detil Skirpsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idNilaiSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilai Detil Skirpsi', 'url'=>array('admin')),
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
