<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftarans' => array('index'),
    $model->idPendaftaran,
);

$this->menu = array(
    array('label' => 'List Pendaftaran', 'url' => array('index')),
    array('label' => 'Create Pendaftaran', 'url' => array('create')),
    array('label' => 'Update Pendaftaran', 'url' => array('update', 'id' => $model->idPendaftaran)),
    array('label' => 'Delete Pendaftaran', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idPendaftaran), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Pendaftaran', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Detil Pendaftaran #<?php echo $model->idPendaftaran; ?></h2> 
                <div class="filter-block pull-right">                                                   
                    <a id="ctl0_maincontent_btnPrintOut" class="btn btn-primary pull-left" title="Print Out Daftar Matkul" href="#"><i class="fa fa-print fa-lg"></i></a> 	
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'Tanggal',
                        'NIM',
                        'IdSidang',
                        'KodePembimbing1',
                        'KodePembimbing2',
                        'Judul',
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>   
