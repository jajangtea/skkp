<?php
/* @var $this PengajuanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengajuans',
);

$this->menu=array(
	array('label'=>'Create Pengajuan', 'url'=>array('create')),
	array('label'=>'Manage Pengajuan', 'url'=>array('admin')),
);
?>

<h1>Pengajuans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
