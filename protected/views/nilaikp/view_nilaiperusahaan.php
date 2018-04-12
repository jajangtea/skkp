<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	$model->IdNilaiKp,
);

$this->menu=array(
	array('label'=>'<i class="fa fa-pencil"></i><span>Ubah</span>', 'url'=>array('nilaiperusahaan', 'NIM'=>Yii::app()->user->name)),
);
?>

<hr/>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NIM',
		'NilaiPerusahaan',
	),
)); ?>
