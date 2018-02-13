<?php
/* @var $this PegawaiController */
/* @var $model UserPegawai */

$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	$model->NIM=>array('view','NIM'=>$model->NIM),
	'Judul',
);


?>



<?php $this->renderPartial('_form', array('model'=>$model,'IDPengajuan'=>$IDPengajuan,'IDJenisSidang'=>$IDJenisSidang,true)); ?>