<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-wrench"></i><span>Kelola</span>', 'url'=>array('admin')),
);
?>
<hr/>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>