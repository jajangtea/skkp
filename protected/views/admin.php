<?php
/* @var $this PendaftaranController */
/* @var $model Pendaftaran */

$this->breadcrumbs = array(
    'Pendaftaran' => array('index'),
    'Manage',
);
?>

<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button'));  ?>

<div>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
    }
    ?>
</div>

<?php
$this->menu = array(
    array('label' => '<i class="fa fa-plus"></i><span>Tambah</span>', 'url' => array('create')),
);
?>

<!-- search-form -->
<hr/>
<?php
if (Yii::app()->user->getLevel() == 2) {
    echo "<div class=\"admin-form\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-lg-12\">";
    echo "<div class=\"main-box clearfix\">";
    echo "<header class=\"main-box-header clearfix\">";
    echo "<h2 class=\"pull-left\"><i class=\"fa fa-bars\"></i> Data Pendaftaran Proposal</h2>";
    echo "</header>";
    echo "<div class=\"main-box-body clearfix\">";
    echo "<div class=\"table-responsive\">";

    $dataProviderUpload = Pendaftaran::model()->tampilStatusPengajuan(Yii::app()->user->name);
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'news-grid',
        'itemsCssClass' => 'table table-hover',
        'dataProvider' => $dataProviderUpload,
        //'template'=>"{items}",
        'columns' => array(
            array(
                'header' => "No",
                'value' => '($this->grid->dataProvider->pagination->currentPage*
                                       $this->grid->dataProvider->pagination->pageSize
                                      )+
                                      array_search($data,$this->grid->dataProvider->getData())+1',
                'htmlOptions' => array('width' => '1%'),
            ),
            array(
                'type' => 'raw',
                'header' => 'Tanggal Daftar',
                'htmlOptions' => array('width' => '3%'),
                'value' => '$data["TanggalDaftar"]',
            ),
            array(
                'type' => 'raw',
                'header' => 'Proposal',
                'htmlOptions' => array('width' => '8%'),
                'value' => '$data["NamaSidang"]',
            ),
            array(
                'type' => 'raw',
                'header' => 'Judul',
                'htmlOptions' => array('width' => '30%'),
                'value' => '$data["Judul"]',
            ),
            array(
                'type' => 'raw',
                'header' => 'Status',
                'htmlOptions' => array('width' => '10%'),
                'value' => '$data["nstatusProposal"]',
            ),
            array(
                'type' => 'raw',
                'header' => 'Pembimbing',
                'htmlOptions' => array('width' => '10%'),
                'value' => '$data["NamaDosen"]==null ? "-" : $data["NamaDosen"]',
            ),
            array(
                'type' => 'raw',
                // 'header' => 'Aksi',
                'htmlOptions' => array('width' => '10%'),
                'value' => 'Chtml::link("<span class=\"badge badge-info\">Lihat</span>",array("pengajuan/view","IDPengajuan"=>$data["IDPengajuan"],"IDJenisSidang"=>$data["IDJenisSidang"]))." | ".Chtml::link("<span class=\"badge badge-important\">Hapus</span>",array("pengajuan/delete","IDPengajuan"=>$data["IDPengajuan"]))',
            ),
        ),
    ));

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

<div class="admin-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pendaftaran Sidang</h2> 
                    <?php
                    if (Yii::app()->user->getLevel() == 1) {
                        echo "<div class=\"filter-block pull-right\">";
                        if ($model->bulan != "" || $model->tahun != "") {
                            echo CHtml::link('<i class="fa  fa-print fa-lg"></i>', array('export', 'bulan' => $model->bulan, 'tahun' => $model->tahun), array('class' => 'btn btn-primary pull-left'));
                        }

                        echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('create'), array('class' => 'btn btn-primary pull-left'));
                        echo "</div>";
                    }
                    ?>

                </header>
                <div class="main-box-body clearfix">  
                    <div class="table-responsive">
                        <?php
//                        $this->widget('zii.widgets.grid.CGridView', array(
//                            'id' => 'pendaftaran-grid',
//                            'dataProvider' => $model->search(),
//                            //'filter' => $model,
//                            'columns' => array(
//                                array(
//                                    'header' => "No",
//                                    'value' => '($this->grid->dataProvider->pagination->currentPage*
//                                       $this->grid->dataProvider->pagination->pageSize
//                                      )+
//                                      array_search($data,$this->grid->dataProvider->getData())+1',
//                                ),
//                                array(
//                                    'name' => 'Tanggal',
//                                    'type' => 'raw',
//                                    'header' => 'Tgl.Daftar',
//                                    'value' => '$data->Tanggal',
//                                    'htmlOptions' => array('width' => '40px'),
//                                ),
//                                'NIM',
//                                array(
//                                    'name' => 'NIM',
//                                    'type' => 'raw',
//                                    'header' => 'Mahasiswa',
//                                    'value' => 'strtoupper(CHtml::encode($data->nIM->Nama))',
//                                    'htmlOptions' => array('width' => '70px'),
//                                ),
//                                array(
//                                    'name' => 'NamaSidang',
//                                    'type' => 'raw',
//                                    'header' => 'Nama Sidang',
//                                    'value' => 'strtoupper(CHtml::encode($data->idSidang->iDJenisSidang->NamaSidang))',
//                                    'htmlOptions' => array('width' => '70px'),
//                                ),
//                                array(
//                                    'name' => 'KodePembimbing1',
//                                    'type' => 'raw',
//                                    'header' => 'P1',
//                                    'value' => 'CHtml::encode($data->kodePembimbing1->KodeDosen)',
//                                    'htmlOptions' => array('width' => '40px'),
//                                ),
//                                array(
//                                    'name' => 'KodePembimbing2',
//                                    'type' => 'raw',
//                                    'header' => 'P2',
//                                    'value' => 'CHtml::encode($data->kodePembimbing2->KodeDosen)',
//                                    'htmlOptions' => array('width' => '40px'),
//                                ),
//                                array(
//                                    'name' => 'Judul',
//                                    'type' => 'raw',
//                                    'header' => 'Judul',
//                                    'value' => 'strtoupper($data->Judul)',
//                                    'htmlOptions' => array('width' => '360px'),
//                                ),
//                                array(
//                                    'type' => 'raw',
//                                    'header' => 'Keterangan',
//                                    'value' => '$data->cekPersyaratan($data->idPendaftaran)',
//                                    'htmlOptions' => array('width' => '20px'),
//                                // 'cssClassExpression' => '$data->cekPersyaratan($data->idPendaftaran) == "Syarat tidak Lengkap" ? "text text-danger" : "text text-info"',
//                                ),
//                                array(
//                                    'class' => 'CButtonColumn',
//                                    'template' => '{upload}{penguji}{delete}',
//                                    'htmlOptions' => array('width' => '', 'style' => 'text-align:center'),
//                                    'buttons' => array
//                                        (
//                                        'penguji' => array
//                                            (
//                                            'label' => 'Penguji KP/Skripsi',
//                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/adduser.png',
//                                            'url' => '(CHtml::encode($data->idSidang->IDJenisSidang))!="3" ? Yii::app()->createUrl("pengujiskripsi/create", array("id"=>$data->idPendaftaran)) : Yii::app()->createUrl("pengujikp/create", array("id"=>$data->idPendaftaran))',
//                                            'visible' => 'Yii::app()->user->getLevel()==1',
//                                        ),
//                                        'upload' => array
//                                            (
//                                            'label' => 'Upload',
//                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/folder.png',
//                                            'url' => 'Yii::app()->createUrl("pendaftaran/view",array("id"=>$data->idPendaftaran))',
//                                        ),
//                                    ),
//                                ),
//                            ),
//                        ));
                        ?>
                    </div>
                </div>

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
                                array(
                                    'name' => 'idPengajuan',
                                    'type' => 'raw',
                                    'header' => 'ID Pengajuan',
                                    'value' => 'strtoupper(CHtml::encode($data->idPengajuan))',
                                    'htmlOptions' => array('width' => '70px'),
                                ),
                                array(
                                    'name' => 'Tanggal',
                                    'type' => 'raw',
                                    'header' => 'Tgl.Daftar',
                                    'value' => '$data->Tanggal',
                                    'htmlOptions' => array('width' => '40px'),
                                ),
                                'NIM',
                                array(
                                    'name' => 'NIM',
                                    'type' => 'raw',
                                    'header' => 'Mahasiswa',
                                    'value' => 'strtoupper(CHtml::encode($data->nIM->Nama))',
                                    'htmlOptions' => array('width' => '70px'),
                                ),
                                array(
                                    'header' => 'Judul',
                                    'value' => '$data->idPengajuan0->Judul',
                                    'headerHtmlOptions' => array('class' => 'rata-kanan'),
                                    'htmlOptions' => array('class' => 'rata-kanan')
                                ),
                                array(
                                    'name' => 'NamaSidang',
                                    'type' => 'raw',
                                    'header' => 'Nama Sidang',
                                    'value' => 'strtoupper(CHtml::encode($data->idSidang->iDJenisSidang->NamaSidang))',
                                    'htmlOptions' => array('width' => '70px'),
                                ),
                                array(
                                    'type' => 'raw',
                                    'header' => 'Keterangan',
                                    'value' => '$data->cekPersyaratan($data->idPendaftaran)',
                                    'htmlOptions' => array('width' => '20px'),
                                // 'cssClassExpression' => '$data->cekPersyaratan($data->idPendaftaran) == "Syarat tidak Lengkap" ? "text text-danger" : "text text-info"',
                                ),
                                array(
                                    'class' => 'CButtonColumn',
                                    'template' => '{upload}{penguji}{delete}',
                                    'htmlOptions' => array('width' => '', 'style' => 'text-align:center'),
                                    'buttons' => array
                                        (
                                        'penguji' => array
                                            (
                                            'label' => 'Penguji KP/Skripsi',
                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/adduser.png',
                                            'url' => '(CHtml::encode($data->idSidang->IDJenisSidang))!="3" ? Yii::app()->createUrl("pengujiskripsi/create", array("id"=>$data->idPendaftaran,"idPengajuan"=>$data->idPengajuan)) : Yii::app()->createUrl("pengujikp/create", array("id"=>$data->idPendaftaran,"idPengajuan"=>$data->idPengajuan))',
                                            'visible' => 'Yii::app()->user->getLevel()==1',
                                        ),
                                        'upload' => array
                                            (
                                            'label' => 'Upload',
                                            'imageUrl' => Yii::app()->request->baseUrl . '/images/folder.png',
                                            'url' => 'Yii::app()->createUrl("pendaftaran/view",array("id"=>$data->idPendaftaran))',
                                        ),
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
</div>