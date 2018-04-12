<?php
/* @var $this UploadProposalController */
/* @var $model UploadProposal */

$this->breadcrumbs = array(
    'Upload Proposals' => array('index'),
    $model->idUpload,
);
?>

<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <strong class="pull-right"><i class="fa fa-anchor"></i> View File Upload # <?php echo $model->namaFile; ?></strong> 
        <div class="filter-block pull-left">                                                   
            <?php echo CHtml::link('<i class="fa  fa-arrow-left fa-lg"></i> Kembali ', array('pengajuan/view', 'IDPengajuan' => $model->idPengajuan, 'IDJenisSidang' => $model->idPengajuan0->IDJenisSidang), array('class' => 'btn btn-primary pull-right')); ?>
        </div>
    </header>
    <div class="main-box-body clearfix"> 
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                array(
                    'name' => 'Persyaratan :',
                    'value' => $model->idPersyaratan0->namaPersyaratan,
                ),
                'namaFile',
                'ukuranFIle',
            ),
        ));
        echo CHtml::image(Yii::app()->baseUrl . "/persyaratan/" . $model->namaFile, 'alt', array("width" => "1000px", "height" => "600px"))
        ?>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'pembimbing-grid',
        'itemsCssClass' => 'table table-striped',
        'dataProvider' => $modelUploadProposal->searchUpload($model->idPengajuan),
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
            array(
                'name' => 'namaFile',
                'type' => 'raw',
                'value' => 'CHtml::link($data->namaFile,"persyaratan/{$data->namaFile}")',
                'filterHtmlOptions' => array('style' => 'width:40%;')
            ),
            'ukuranFIle',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
</div>
