<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilaidetilskirpsis'=>array('index'),
	$model->idNilaiSkripsi=>array('view','id'=>$model->idNilaiSkripsi),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nilaidetilskirpsi', 'url'=>array('index')),
	array('label'=>'Create Nilaidetilskirpsi', 'url'=>array('create')),
	array('label'=>'View Nilaidetilskirpsi', 'url'=>array('view', 'id'=>$model->idNilaiSkripsi)),
	array('label'=>'Manage Nilaidetilskirpsi', 'url'=>array('admin')),
);
?>

<h1>Update Nilaidetilskirpsi <?php echo $model->idNilaiSkripsi; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>