<div>
    <hr/>
    <?php
    if (Yii::app()->user->getLevel() == 1) {
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Data Pembimbing</h2> 
                <?php
                if (Yii::app()->user->getLevel() == 1) {
                    echo "<div class=\"filter-block pull-right\">";
                    echo "<a id=\"ctl0_maincontent_btnPrintOut\" class=\"btn btn-primary pull-left\" title=\"Print Out Data Pendaftaran\" href=\"index.php?r=pendaftaran/export\"><i class=\"fa fa-print fa-lg\"></i></a>";
                    echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i>', array('pengajuan/admin'), array('class' => 'btn btn-primary pull-left','title'=>'Tambah Pembimbing'));
                    echo "</div>";
                }
                ?>

            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'pembimbing-grid',
                        'itemsCssClass' => 'table table-striped',
                        'dataProvider' => $model->search(),
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
                                'name' => 'idDosen',
                                'type' => 'raw',
                                'header' => 'Pembimbing',
                                'value' => '$data->idDosen0->username',
                                'htmlOptions' => array('width' => '40px'),
                            ),
                            'idPengajuan0.iDJenisSidang.NamaSidang',
                            'idPengajuan0.NIM',
                            'idPengajuan0.nIM.Nama',
                            'idPengajuan0.Judul',
                            array
                                (
                                'class' => 'CButtonColumn',
                                'template' => '{download}{ubah}{hapus}',
                                'buttons' => array
                                    (
                                    'download' => array
                                        (
                                        'label' => 'Download ',
                                        // 'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                                        'url' => ' Yii::app()->createUrl("pembimbing/view", array("id"=>$data["idPembimbing"],"idPengajuan"=>$data["idPengajuan"]))',
                                    //'click' => 'function(){return confirm("Password akan direset menjadi 1234 ?");}',
                                    ),
                                    'ubah' => array
                                        (
                                        'label' => '| Ubah |',
                                        'url' => ' Yii::app()->createUrl("pembimbing/update", array("id"=>$data["idPembimbing"]))',
                                        'click' => 'function(){return confirm("Apakah akan diubah ?");}',
                                        'visible' => 'Yii::app()->user->getLevel()==1',
                                    ),
                                    'hapus' => array
                                        (
                                        'label' => ' Hapus ',
                                        //  'imageUrl' => Yii::app()->request->baseUrl . '/images/sync.png',
                                        'url' => ' Yii::app()->createUrl("pembimbing/delete", array("id"=>$data["idPembimbing"]))',
                                        'click' => 'function(){return confirm("Apakah akan dihapus ?");}',
                                        'visible' => 'Yii::app()->user->getLevel()==1',
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
