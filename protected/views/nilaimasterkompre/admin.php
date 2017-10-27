<?php
/* @var $this NilaimasterkompreController */
/* @var $model Nilaimasterskripsi */

$this->breadcrumbs=array(
	'Nilai Kompre'=>array('index'),
	'Kelola',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return true;
});
$('.search-form form').submit(function(){
	$('#nilaimasterskripsi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return true;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nilaimasterskripsi-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                    'header' => "No",
                    'value' => '($this->grid->dataProvider->pagination->currentPage*
                           $this->grid->dataProvider->pagination->pageSize
                          )+
                          array_search($data,$this->grid->dataProvider->getData())+1',
                ),
                'NIM',
                'nIM.Nama',
		'NKompre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
