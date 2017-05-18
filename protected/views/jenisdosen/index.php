<?php
/* @var $this JenisdosenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenisdosens',
);

$this->menu=array(
	array('label'=>'Create Jenisdosen', 'url'=>array('create')),
	array('label'=>'Manage Jenisdosen', 'url'=>array('admin')),
);
?>

<h1>Jenisdosens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
