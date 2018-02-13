<?php
/* @var $this PersyaratanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persyaratans',
);

$this->menu=array(
	array('label'=>'Create Persyaratan', 'url'=>array('create')),
	array('label'=>'Manage Persyaratan', 'url'=>array('admin')),
);
?>

<h1>Persyaratan</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
