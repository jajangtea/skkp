<?php
/* @var $this MahasiswaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mahasiswas',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>

<h1>Mahasiswa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
