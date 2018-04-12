<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Nilai Kerja Praktek</h2> 
                <div class="filter-block pull-right">                                                   
                    <?php echo CHtml::link('<i class="fa  fa-plus-circle fa-lg"></i> Nilai Perusahaan', array('nilaikp/nilaiperusahaan','NIM'=>Yii::app()->user->name), array('class' => 'btn btn-primary pull-left','title'=>'Nilai Perusahaan')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><a href="#"><span>No</span></a></th>
                                <th><a href="#" class="desc"><span>Keterangan</span></a></th>
                                <th><a href="#" class="asc"><span>Nilai</span></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">1</a>
                                </td>
                                <td>
                                    <?php echo CHtml::encode($data->getAttributeLabel('NA')); ?>
                                </td>
                                <td>
                                    <a href="#"><span class="label label-success"><?php echo CHtml::encode($data->NA); ?></span></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <a href="#">2</a>
                                </td>
                                <td>
                                    <?php echo CHtml::encode($data->getAttributeLabel('Index')); ?>
                                </td>
                                <td>
                                    <a href="#"><span class="label label-danger"><?php echo CHtml::encode($data->Index); ?></span></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   



