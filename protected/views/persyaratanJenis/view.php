<?php
/* @var $this PersyaratanJenisController */
/* @var $model PersyaratanJenis */

$this->breadcrumbs=array(
	'Persyaratan Jenises'=>array('index'),
	$model->idPersyaratanJenis,
);

$this->menu=array(
	array('label'=>'List PersyaratanJenis', 'url'=>array('index')),
	array('label'=>'Create PersyaratanJenis', 'url'=>array('create')),
	array('label'=>'Update PersyaratanJenis', 'url'=>array('update', 'id'=>$model->idPersyaratanJenis)),
	array('label'=>'Delete PersyaratanJenis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPersyaratanJenis),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersyaratanJenis', 'url'=>array('admin')),
);
?>

<h1>View PersyaratanJenis #<?php echo $model->idPersyaratanJenis; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPersyaratanJenis',
		'idJenisSidang',
		'idPersyaratan',
	),
)); ?>
