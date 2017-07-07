<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs = array(
    'Nilai KP' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Nilai KP', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nilaikp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<hr/>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Nilai KP</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'nilaikp-grid',
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
                            'nIM.Nama',
                            'NilaiPembimbing',
                            'NilaiPenguji',
                            'NilaiPerusahaan',
                            'NA',
                            /*
                              'Index',
                             */
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