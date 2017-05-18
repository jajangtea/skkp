<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
	$model->NIM,
);

$this->menu=array(
	array('label'=>'List Mahasiswa', 'url'=>array('index')),
	array('label'=>'Create Mahasiswa', 'url'=>array('create')),
	array('label'=>'Update Mahasiswa', 'url'=>array('update', 'id'=>$model->NIM)),
	array('label'=>'Delete Mahasiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NIM),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mahasiswa', 'url'=>array('admin')),
);
?>

<h1>View Mahasiswa #<?php echo $model->NIM; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NIM',
		'Nama',
		'Tlp',
		'KodeJurusan',
	),
)); ?>
