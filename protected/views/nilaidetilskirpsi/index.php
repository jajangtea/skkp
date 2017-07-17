<?php
/* @var $this NilaidetilskirpsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nilai Detil Skirpsi',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus"></i><span>Tambah</span>', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>


<h1>Nilai Detil Skirpsi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
