<?php
/* @var $this PembimbingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pembimbings',
);

$this->menu=array(
	array('label'=>'Create Pembimbing', 'url'=>array('create')),
	array('label'=>'Manage Pembimbing', 'url'=>array('admin')),
);
?>

<h1>Pembimbings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
