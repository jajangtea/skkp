<?php
/* @var $this PengujiskripsiController */
/* @var $model Pengujiskripsi */

$this->breadcrumbs=array(
	'Pengujiskripsis'=>array('index'),
	$model->idPengujiSkripsi=>array('view','id'=>$model->idPengujiSkripsi),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengujiskripsi', 'url'=>array('index')),
	array('label'=>'Create Pengujiskripsi', 'url'=>array('create')),
	array('label'=>'View Pengujiskripsi', 'url'=>array('view', 'id'=>$model->idPengujiSkripsi)),
	array('label'=>'Manage Pengujiskripsi', 'url'=>array('admin')),
);
?>

<h1>Update Pengujiskripsi <?php echo $model->idPengujiSkripsi; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>