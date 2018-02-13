<?php
/* @var $this NilaiPengujiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilai Pengujis',
);

$this->menu=array(
	array('label'=>'Create NilaiPenguji', 'url'=>array('create')),
	array('label'=>'Manage NilaiPenguji', 'url'=>array('admin')),
);
?>

<h1>Nilai Pengujis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
