<?php
/* @var $this NilaidetilskirpsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilai Detil Skirpsi',
);

$this->menu=array(
	array('label'=>'Create Nilai Detil Skirpsi', 'url'=>array('create')),
	array('label'=>'Manage Nilai Detil Skirpsi', 'url'=>array('admin')),
);
?>

<h1>Nilai Detil Skirpsi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
