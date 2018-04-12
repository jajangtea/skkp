<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs = array(
    'Pengajuan' => array('index'),
    'Manage',
);
?>

<div>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
    }
    ?>
</div>

<div class="admin-form">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pengajuan Proposal</h2> 
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
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'pengajuan-grid',
                            'itemsCssClass' => 'table table-striped',
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
                                'iDJenisSidang.NamaSidang',
                                'NIM',
                                'nIM.Nama',
                                'TanggalDaftar',
                                array(
                                    'name' => 'Judul',
                                    'type' => 'raw',
                                    'header' => 'Judul',
                                    'value' => 'strtoupper($data->Judul)',
                                    // 'value' => '$data->idstatusProposal0->statusProposal',
                                    'htmlOptions' => array('width' => '250px'),
                                ),
                                array(
                                    'name' => 'IDstatusProposal',
                                    'type' => 'raw',
                                    'header' => 'Status',
                                    'value' => '$data->iDstatusProposal->nstatusProposal',
                                    // 'value' => '$data->idstatusProposal',//0->statusProposal',
                                    'htmlOptions' => array('width' => '40px'),
                                ),
//                                array(
//                                    'name' => 'status',
//                                    'type' => 'raw',
//                                    'value' =>
//                                    'CHtml::dropDownList(
//                        "IDstatusProposal",
//                        "",
//                        CHtml::listData(
//                                Statusproposal::model()->findAll(),
//                                "idstatusProp",
//                                "nstatusProposal"
//                        ),
//                                array(
//                                        "idstatusProp"=>$data->IDstatusProposal,
//                                        "class"=>"drop",
//                                        "options"=>array($data->IDstatusProposal=>array("selected"=>"selected")),
//                                )
//                        )',
//                                ),
                                'keterangan',
                                array(
                                    'type' => 'raw',
                                    // 'header' => 'Aksi',
                                    'htmlOptions' => array('width' => '30%'),
                                    'value' => 'Chtml::link("<span class=\"badge badge-success\">Lihat</span>",array("pengajuan/view","IDPengajuan"=>$data["IDPengajuan"],"IDJenisSidang"=>$data["IDJenisSidang"]))." | ".Chtml::link("<span class=\"badge badge-info\">Verifikasi</span>",array("pengajuan/verifikasi", "id"=>$data["IDPengajuan"]))." | ".Chtml::link("<span class=\"badge badge-warning\">Pembimbing</span>",array("pembimbing/create","id"=>$data["IDPengajuan"]))." | ".Chtml::link("<span class=\"badge badge-danger\">Hapus</span>",array("pengajuan/delete","id"=>$data["IDPengajuan"]))',
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
