<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model idNilaiSkripsi */

$this->breadcrumbs=array(
	'Nilai Pra Sidang'=>array('index'),
	$model->idNilaiSkripsi,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-bars"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Ubah</span>', 'url'=>array('update', 'id'=>$model->idNilaiSkripsi)),
	array('label'=>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idNilaiSkripsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<hr/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idNilaiSkripsi',
		'NPraSidang',
	),
)); ?>
