<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs = array(
    'Dosens' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Dosen', 'url' => array('index')),
    array('label' => 'Create Dosen', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dosen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<hr/>

<div>
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'dosen-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array(
            'header' => "No",
            'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
        ),
        'KodeDosen',
        'NamaDosen',
        'Tlp',
        'idUser.level.level',
        array
        (
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array
            (
                'update' => array
                (
                    'label'=>'Ubah',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                    'url'=>'Yii::app()->createUrl("dosen/update", array("id"=>$data->KodeDosen))',
                ),
            ),
        ),
    ),
));
?>
