<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	$model->IdNMSkripsi=>array('view','id'=>$model->IdNMSkripsi),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil"></i><span>Lihat</span>', 'url'=>array('view', 'id'=>$model->IdNMSkripsi)),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<hr/>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>