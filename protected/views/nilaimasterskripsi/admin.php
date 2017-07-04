<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Nilai Master Skripsi', 'url'=>array('index')),
	array('label'=>'Create Nilai Master Skripsi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nilaimasterskripsi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Nilai Master Skripsi</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nilaimasterskripsi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdNMSkripsi',
		'IdPendaftaran',
		'NKompre',
		'NPraSidang',
		'NSidangSkripsi',
		'NPembimbing',
		/*
		'NA',
		'Index',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
