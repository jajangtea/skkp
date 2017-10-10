<?php
/* @var $this PengujikpController */
/* @var $model Pengujikp */

$this->breadcrumbs = array(
    'Penguji KP' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Pengujikp', 'url' => array('index')),
    array('label' => 'Create Pengujikp', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pengujikp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Penguji KP</h2> 
                <?php
                if (Yii::app()->user->getLevel() == 1) {
                    echo "<div class=\"filter-block pull-right\">";
                    echo "<a id=\"ctl0_maincontent_btnPrintOut\" class=\"btn btn-primary pull-left\" title=\"Print Out Data Pendaftaran\" href=\"index.php?r=pendaftaran/export\"><i class=\"fa fa-print fa-lg\"></i></a>";
                    echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left'));
                    echo "</div>";
                }
                ?>

            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'pengujikp-grid',
                        'dataProvider' => $model->searchid($id),
                        //'filter' => $model,
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
                             'idPendaftaran0.NIM',
                            'idPendaftaran0.nIM.Nama',
                            'idPendaftaran0.Judul',
                            array(
                                'name' => 'idUser',
                                'type' => 'raw',
                                'header' => 'Penguji',
                                'value' => 'CHtml::encode($data->idUser0->username)',
                            ),
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>   