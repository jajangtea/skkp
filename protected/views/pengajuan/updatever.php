<?php
/* @var $this PegawaiController */
/* @var $model UserPegawai */

$this->breadcrumbs=array(
	'Pengajuan'=>array('admin'),
	$model->NIM=>array('view','NIM'=>$model->NIM),
	'Judul',
);


?>
<?php $this->renderPartial('_formver', array('model'=>$model)); ?>