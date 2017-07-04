<?php
/* @var $this NilaidetilskirpsiController */
/* @var $model Nilaidetilskirpsi */

$this->breadcrumbs=array(
	'Nilai Detil Skirpsi'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ', 'url'=>array('index')),
	array('label'=>'Create Nilai Detil Skirpsi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nilaidetilskirpsi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Nilai Detil Skirpsi</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nilaidetilskirpsi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idNilaiSkripsi',
		'IdPendaftaran',
		'NilaiPenguji1',
		'NIlaiPenguji2',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
