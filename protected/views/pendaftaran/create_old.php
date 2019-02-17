<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs=array(
	'Pendaftarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('index')),
);
?>


<?php $this->renderPartial('_form_old', array('model'=>$model)); ?>