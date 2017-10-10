<?php
/* @var $this PengujikpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengujikps',
);

$this->menu=array(
	array('label'=>'Create Pengujikp', 'url'=>array('create')),
	array('label'=>'Manage Pengujikp', 'url'=>array('admin')),
);
?>

<h1>Pengujikps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
