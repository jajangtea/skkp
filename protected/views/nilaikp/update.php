<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	$model->IdNilaiKp=>array('view','id'=>$model->IdNilaiKp),
	'Update',
);

$this->menu=array(
//	array('label'=>'<i class="fa fa-eye"></i><span>Lihat</span>', 'url'=>array('index')),
//	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
//	array('label'=>'<i class="fa fa-bars"></i><span>Detil</span>', 'url'=>array('view', 'id'=>$model->IdNilaiKp)),
//	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<hr/>

<?php 

$this->renderPartial('_form', array('model'=>$model)); ?>