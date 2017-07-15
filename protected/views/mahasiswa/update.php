<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
	$model->NIM=>array('view','id'=>$model->NIM),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-paper-plane"></i><span>Lihat</span>', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-eye"></i><span>Detil</span>', 'url'=>array('view', 'id'=>$model->NIM)),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<h1>Update Mahasiswa <?php echo $model->NIM; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>