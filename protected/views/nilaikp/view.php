<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs=array(
	'Nilaikps'=>array('index'),
	$model->IdNilaiKp,
);

$this->menu=array(
	array('label'=>'List Nilaikp', 'url'=>array('index')),
	array('label'=>'Create Nilaikp', 'url'=>array('create')),
	array('label'=>'Update Nilaikp', 'url'=>array('update', 'id'=>$model->IdNilaiKp)),
	array('label'=>'Delete Nilaikp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdNilaiKp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilaikp', 'url'=>array('admin')),
);
?>

<h1>View Nilaikp #<?php echo $model->IdNilaiKp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdNilaiKp',
		'NIM',
		'NilaiPembimbing',
		'NilaiPenguji',
		'NilaiPerusahaan',
		'NA',
		'Index',
	),
)); ?>
