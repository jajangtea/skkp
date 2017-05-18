<?php
/* @var $this SidangmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sidangmasters',
);

$this->menu=array(
	array('label'=>'Create Sidangmaster', 'url'=>array('create')),
	array('label'=>'Manage Sidangmaster', 'url'=>array('admin')),
);
?>

<h1>Sidangmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
