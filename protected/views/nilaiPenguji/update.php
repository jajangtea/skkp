<?php
/* @var $this NilaiPengujiController */
/* @var $model NilaiPenguji */

$this->breadcrumbs=array(
	'Nilai Pengujis'=>array('index'),
	$model->idNilaiPenguji=>array('view','id'=>$model->idNilaiPenguji),
	'Update',
);

$this->menu=array(
	array('label'=>'List NilaiPenguji', 'url'=>array('index')),
	array('label'=>'Create NilaiPenguji', 'url'=>array('create')),
	array('label'=>'View NilaiPenguji', 'url'=>array('view', 'id'=>$model->idNilaiPenguji)),
	array('label'=>'Manage NilaiPenguji', 'url'=>array('admin')),
);
?>

<h1>Update NilaiPenguji <?php echo $model->idNilaiPenguji; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>