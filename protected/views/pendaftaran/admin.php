<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftaran' => array('index'),
    'Manage',
);
?>

<h1>Kelola Pendaftaran</h1>
<div class="search-form">
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
                <h2 class="pull-left"><i class="fa fa-bars"></i> Daftar Matakuliah</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'pendaftaran-grid',
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
                            'Tanggal',
                            'NIM',
                            'IDJenisSidang',
                            'KodePembimbing1',
                            'KodePembimbing2',
                            /*
                              'Judul',
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