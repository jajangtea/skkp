<?php
/* @var $this PersyaratanController */
/* @var $model Persyaratan */

$this->breadcrumbs = array(
    'Persyaratans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Persyaratan', 'url' => array('index')),
    array('label' => 'Create Persyaratan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persyaratan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<hr/>
<h1>Kelola Syarat - Syarat</h1>

<div>
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'persyaratan-grid',
    'itemsCssClass' => 'table table-hover',
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
        'namaPersyaratan',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
