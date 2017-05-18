<?php
/* @var $this NilaidetilskirpsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilaidetilskirpsis',
);

$this->menu=array(
	array('label'=>'Create Nilaidetilskirpsi', 'url'=>array('create')),
	array('label'=>'Manage Nilaidetilskirpsi', 'url'=>array('admin')),
);
?>

<h1>Nilaidetilskirpsis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
