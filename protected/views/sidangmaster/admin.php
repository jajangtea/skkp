<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sidangmaster', 'url'=>array('index')),
	array('label'=>'Create Sidangmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sidangmaster-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sidang</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sidangmaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(
                    'header' => "No",
                    'value' => '($this->grid->dataProvider->pagination->currentPage*
                                               $this->grid->dataProvider->pagination->pageSize
                                              )+
                                              array_search($data,$this->grid->dataProvider->getData())+1',
                    'htmlOptions' => array(
                        'style' => 'width: 2%; text-align: center;',
                    ),
                ),
		'Tanggal',
//                array(
//			'name'	=>'Tanggal',
//			'type'	=>'raw',
//			'value'=>'CHtml::link($data->Tanggal,array("view","id"=>$data->IdSidangDetil))', 
//		),
		'iDJenisSidang.NamaSidang',
                array(
			'name'=>'status',
                        //'filter' => CHtml::activeDropDownList($model, 'status', $model->jenisStatus(), array('prompt' => 'Pilih', 'class' => 'form-control')),
			'type'=>'raw',
			'header'=>'Status',
			'value'=>'CHtml::encode($data->ubahStatus())',
			'htmlOptions'=>array('width'=>''),
		),
                'tglBuka',
                'tglTutup',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
