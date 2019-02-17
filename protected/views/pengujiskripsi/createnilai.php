<?php
/* @var $this NilaiPengujiController */
/* @var $model NilaiPenguji */

$this->breadcrumbs=array(
	'Nilai Penguji'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NilaiPenguji', 'url'=>array('index')),
	array('label'=>'Manage NilaiPenguji', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_formnilai', array('model'=>$model)); ?>