<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs=array(
	'Pendaftarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pendaftaran', 'url'=>array('index')),
	array('label'=>'Manage Pendaftaran', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model,'modelMhs'=>$modelMhs)); ?>