<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs=array(
	'Nilai Master Skripsi'=>array('index'),
	'Manage',
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

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
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
                'idPendaftaran0.Tanggal',
                'NIM',
		'nIM.Nama',
		'NKompre',
		'NPraSidang',
		'NSidangSkripsi',
		'NPembimbing',
		'NA',
		'Index',
                'status',
                'idPengajuan',
				 
				 array(
                            'type' => 'raw',
                            'header' => 'NA',
                            'htmlOptions' => array('width' => '10%'),
                            'value' => 'CHtml::link($data["NA"]==null?0:"Refresh Nilai", array("nilaimasterskripsi/update","id"=> $data->IdNMSkripsi,"idPengajuan"=> $data->idPengajuan))',
                        ),
		
	),
)); ?>
