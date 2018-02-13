<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

$this->breadcrumbs=array(
	'Pembimbings'=>array('index'),
	$model->idPembimbing=>array('view','id'=>$model->idPembimbing),
	'Update',
);

$this->menu=array(
	array('label'=>'Tambah Pembimbing', 'url'=>array('create')),
	array('label'=>'Lihat Pembimbing', 'url'=>array('view', 'id'=>$model->idPembimbing)),
	array('label'=>'Kelola Pembimbing', 'url'=>array('admin')),
);
?>

<h3>Ubah Pembimbing : <?php echo $model->idDosen0->username; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>