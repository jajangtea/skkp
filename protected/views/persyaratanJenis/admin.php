<?php
/* @var $this PersyaratanJenisController */
/* @var $model PersyaratanJenis */

$this->breadcrumbs = array(
    'Persyaratan Jenises' => array('index'),
    'Manage',
);

$this->menu = array(
   // array('label' => 'Daftar Jenis Persyaratan', 'url' => array('index')),
    array('label' => 'Tambah Jenis Persyaratan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persyaratan-jenis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Kelola Jenis Persyaratan</h3>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'persyaratan-jenis-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass'=>'table table-striped',
   // 'filter' => $model,
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
        'idJenisSidang0.NamaSidang',
        'idPersyaratan0.namaPersyaratan',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
