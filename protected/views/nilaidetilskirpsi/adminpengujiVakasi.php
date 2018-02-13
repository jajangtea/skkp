<?php
/* @var $this NilaikpController */
/* @var $model Nilaikp */

$this->breadcrumbs = array(
    'Vakasi' => array('index'),
    'Manage',
);
?>



<div class="row">
<div>
    <?php
   
        $this->renderPartial('_searchVakasi', array(
            'model' => $model,
        ));
    ?>
</div>
</div><!-- search-form -->
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Vakasi Penguji Pra/Sidang Skripsi</h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'nilaipenguji-grid',
                        
                       
                       // 'filter' => $model,
                         'dataProvider' =>  $model->searchVakasi(),
                        'columns' => array(
                            array(
                                'header' => "No",
                                'value' => '($this->grid->dataProvider->pagination->currentPage*
                           $this->grid->dataProvider->pagination->pageSize
                          )+
                          array_search($data,$this->grid->dataProvider->getData())+1',
                                  'htmlOptions' => array('width' => '5%'),
                            ),
                            array(
                                'type' => 'raw',
                                'header' => 'NIM',
                                //'headerHtmlOptions' => array('style' => 'display:none'),
                                'htmlOptions' => array('width' => '10%'),
                                'value' => '$data->idPendaftaran->NIM',
                            ),
                           array(
                            'type' => 'raw',
                            'header' => 'Nama',
                            'htmlOptions' => array('width' => '15%'),
                            'value' => 'CHtml::encode(strtoupper($data->idPendaftaran->nIM->Nama))',
                            'value' => 'strtoupper($data->idPendaftaran->nIM->Nama)',
                        ),
                            array(
                            'type' => 'raw',
                            'header' => 'Sidang',
                            'htmlOptions' => array('width' => '6%'),
                            'value' => 'CHtml::encode(strtoupper($data->idPendaftaran->idSidang->iDJenisSidang->NamaSidang))',
                        ),
                            
                            array(
                                'type' => 'raw',
                                'header' => 'Vakasi',
                                'value' => 'number_format($data->idPendaftaran->idSidang->iDJenisSidang->NominalVakasi, 2)',
                                'footer' => Nilaidetilskirpsi::model()->getTotalSkripsi(Yii::app()->user->id),
                                'htmlOptions' => array(
                                    'style' => 'width: 20%; text-align: left;',
                                ),
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>   
</div>