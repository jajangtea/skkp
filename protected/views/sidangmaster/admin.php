<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs = array(
    'Sidangmaster' => array('index'),
    'Manage',
);
?>

<hr/>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button'));   ?>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Detil Sidang #<?php echo $model->Tanggal; ?></h2> 
                <div class="filter-block pull-right">    
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('periode/admin'), array('class' => 'btn btn-primary pull-left')); ?>
                    <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('admin'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'sidangmaster-grid',
                    'selectableRows' => 2,
                    'dataProvider' => $model->search(),
                    //'filter'=>$model,
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
                        array(
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 2,
                            'checked' => 'CHtml::encode($data->ubahStatus())',
                            'id' => 'idsidang',
                            'name' => 'IdSidang',
                        ),
                        'Tanggal',
                        'iDJenisSidang.NamaSidang',
                        array(
                            'name' => 'status',
                            //'filter' => CHtml::activeDropDownList($model, 'status', $model->jenisStatus(), array('prompt' => 'Pilih', 'class' => 'form-control')),
                            'type' => 'raw',
                            'header' => 'Status',
                            'value' => 'CHtml::encode($data->kondisiStatus())',
                            'htmlOptions' => array('width' => ''),
                        ),
                        'tglBuka',
                        'tglTutup',
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



