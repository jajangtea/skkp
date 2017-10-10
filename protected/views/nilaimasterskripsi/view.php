<?php
/* @var $this Nilai Master SkripsiController */
/* @var $model Nilai Master Skripsi */

$this->breadcrumbs = array(
    'Nilai Master Skripsi' => array('index'),
    $model->IdNMSkripsi,
);

$this->menu = array(
    array('label' => '<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
    array('label' => '<i class="fa fa-pencil"></i><span>Pencil</span>', 'url' => array('update', 'id' => $model->IdNMSkripsi)),
    array('label' => '<i class="fa fa-eraser"></i><span>Hapus</span>', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->IdNMSkripsi), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => '<i class="fa fa-wrench"></i><span>Kelola</span>', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Nilai Akhir Skripsi  </h2> 
                <div class="filter-block pull-right">                                                   
                    <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('admin'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix"> 

                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'NIM',
                        'nIM.Nama',
//                        array(
//                            'name' => 'Judul',
//                           // 'filter' => CHtml::listData(Pendaftaran::model()->findAll()), // fields from country table
//                            'value' => Pendaftaran::Model()->with('idSidang')->findAll('IDJenisSidang=2')->Judul,
//                        ),
                        'NKompre',
                        'NPraSidang',
                        'NSidangSkripsi',
                        'NPembimbing',
                        'NA',
                        'Index',
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>   

