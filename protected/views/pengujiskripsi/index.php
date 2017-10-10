<?php
/* @var $this PengujiskripsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengujiskripsis',
);

$this->menu=array(
	array('label'=>'Create Pengujiskripsi', 'url'=>array('create')),
	array('label'=>'Manage Pengujiskripsi', 'url'=>array('admin')),
);
?>

<h1>Pengujiskripsis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
