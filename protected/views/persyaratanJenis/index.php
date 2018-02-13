<?php
/* @var $this PersyaratanJenisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persyaratan Jenises',
);

$this->menu=array(
	array('label'=>'Create PersyaratanJenis', 'url'=>array('create')),
	array('label'=>'Manage PersyaratanJenis', 'url'=>array('admin')),
);
?>

<h1>Persyaratan Jenises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
