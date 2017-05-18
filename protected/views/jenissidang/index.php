<?php
/* @var $this JenissidangController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenissidangs',
);

$this->menu=array(
	array('label'=>'Create Jenissidang', 'url'=>array('create')),
	array('label'=>'Manage Jenissidang', 'url'=>array('admin')),
);
?>

<h1>Jenissidangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
