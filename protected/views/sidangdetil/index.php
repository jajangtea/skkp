<?php
/* @var $this SidangdetilController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sidangdetils',
);

$this->menu=array(
	array('label'=>'Create Sidangdetil', 'url'=>array('create')),
	array('label'=>'Manage Sidangdetil', 'url'=>array('admin')),
);
?>

<h1>Sidangdetils</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
