<?php
/* @var $this TaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'TA',
);

$this->menu=array(
	array('label'=>'Create TA', 'url'=>array('create')),
	array('label'=>'Manage TA', 'url'=>array('admin')),
);
?>

<h1>Tas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
