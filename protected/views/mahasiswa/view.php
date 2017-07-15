<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
	$model->NIM,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-paper-plane"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Lihat</span>', 'url'=>array('update', 'id'=>$model->NIM)),
	array('label'=>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NIM),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
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
