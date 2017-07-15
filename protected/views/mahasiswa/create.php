<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-paper-plane"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<h1>Create Mahasiswa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>