<?php
/* @var $this JadwalBimbinganController */
/* @var $model JadwalBimbingan */

$this->breadcrumbs = array(
    'Jadwal Bimbingans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Jadwal Bimbingan', 'url' => array('index')),
    array('label' => 'Create Jadwal Bimbingan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jadwal-bimbingan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jadwal Bimbingan</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
//$this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'jadwal-bimbingan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
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
        'hari',
        'jam',
        'KodeDosen',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
