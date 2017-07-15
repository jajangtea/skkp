<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftarans' => array('index'),
    $model->idPendaftaran,
);

$this->menu = array(
    array('label'=>'<i class="fa fa-eye"></i><span>Lihat</span>', 'url' => array('index')),
    array('label' =>'<i class="fa fa-pencil"></i><span>Ubah</span>', 'url' => array('update', 'id' => $model->idPendaftaran)),
    array('label' =>'<i class="fa fa-eraser"></i><span>Hapus</span>', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idPendaftaran), 'confirm' => 'Are you sure you want to delete this item?')),
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
                        array(
                                'name' => 'Mahasiswa',
                                'value' => $model->nIM->Nama,
                            ),
                        array(
                                'name' => 'Tanggal Daftar',
                                'value' => $model->Tanggal,
                            ),
                        array(
                                'name' => 'Sidang',
                                'value' => $model->idSidang->iDJenisSidang->NamaSidang,
                            ),
                        array(
                                'name' => 'Kode',
                                'value' => $model->KodePembimbing1,
                            ),
                        array(
                                'name' => 'Nama P1',
                                'value' => $model->kodePembimbing1->NamaDosen,
                            ),
                        
                        array(
                                'name' => 'Kode',
                                'value' => $model->KodePembimbing2,
                            ),
                        array(
                                'name' => 'Nama P2',
                                'value' => $model->kodePembimbing2->NamaDosen,
                            ),
                        'Judul',
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>   
