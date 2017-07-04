<?php
/* @var $this Nilai Master SkripsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilai Master Skripsis',
);

$this->menu=array(
	array('label'=>'Create Nilai Master Skripsi', 'url'=>array('create')),
	array('label'=>'Manage Nilai Master Skripsi', 'url'=>array('admin')),
);
?>

<h1>Nilai Master Skripsis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
