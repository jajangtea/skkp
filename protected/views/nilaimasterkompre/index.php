<?php
/* @var $this NilaimasterkompreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilaimasterskripsis',
);

$this->menu=array(
	array('label'=>'Create Nilaimasterskripsi', 'url'=>array('create')),
	array('label'=>'Manage Nilaimasterskripsi', 'url'=>array('admin')),
);
?>

<h1>Nilaimasterskripsis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
