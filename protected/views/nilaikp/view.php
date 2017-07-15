<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	$model->IdNilaiKp,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-bars"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Ubah</span>', 'url'=>array('update', 'id'=>$model->IdNilaiKp)),
	array('label'=>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNilaiKp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Tambah</span>', 'url'=>array('admin')),
);
?>

<hr/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNilaiKp',
		'NIM',
		'NilaiPembimbing',
		'NilaiPenguji',
		'NilaiPerusahaan',
		'NA',
		'Index',
	),
)); ?>
