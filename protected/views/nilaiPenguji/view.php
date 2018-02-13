<?php
/* @var $this NilaiPengujiController */
/* @var $model NilaiPenguji */

$this->breadcrumbs=array(
	'Nilai Pengujis'=>array('index'),
	$model->idNilaiPenguji,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-bars"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Ubah</span>', 'url'=>array('update', 'id'=>$model->idNilaiPenguji)),
	array('label'=>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idNilaiPenguji),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>
<hr/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'idPengujiSkripsi0.idPendaftaran0.NIM',
                'idPengujiSkripsi0.idPendaftaran0.nIM.Nama',
		'idPengujiSkripsi0.idPendaftaran0.Judul',
		'nilaiSkripsi',
	),
)); ?>
