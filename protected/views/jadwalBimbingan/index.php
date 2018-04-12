<?php
/* @var $this JadwalBimbinganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jadwal Bimbingan',
);

$this->menu=array(
	array('label'=>'Create Jadwal Bimbingan', 'url'=>array('create')),
	array('label'=>'Manage Jadwal Bimbingan', 'url'=>array('admin')),
);
?>

<h1>Jadwal Bimbingan</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
