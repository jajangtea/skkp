<?php
/* @var $this UploadProposalController */
/* @var $model UploadProposal */

$this->breadcrumbs = array(
    'Upload Proposals' => array('index'),
    $model->idUpload,
);

$this->menu = array(
    array('label' => 'List UploadProposal', 'url' => array('index')),
    array('label' => 'Create UploadProposal', 'url' => array('create')),
    array('label' => 'Update UploadProposal', 'url' => array('update', 'id' => $model->idUpload)),
    array('label' => 'Delete UploadProposal', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idUpload), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage UploadProposal', 'url' => array('admin')),
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
    </div></div>
