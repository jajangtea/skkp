<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs = array(
    'Mahasiswas' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' =>'<i class="fa fa-paper-plane"></i><span>Lihat</span>', 'url' => array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mahasiswa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1></h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<hr/>
<div class="main-box-body clearfix">  
    <div class="table-responsive"></div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mahasiswa-grid',
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
            'NIM',
            'Nama',
            'Tlp',
            'KodeJurusan',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div></div>