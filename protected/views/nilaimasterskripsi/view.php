<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	$model->IdNMSkripsi,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Pencil</span>', 'url'=>array('update', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNMSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<h1>View Nilai Master Skripsi #<?php echo $model->IdNMSkripsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNMSkripsi',
		'IdPendaftaran',
		'NKompre',
		'NPraSidang',
		'NSidangSkripsi',
		'NPembimbing',
		'NA',
		'Index',
	),
)); ?>
