<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs=array(
	'Sidangmasters'=>array('index'),
	$model->IdSidang,
);
?>

<div class="row">
    <div class="col-lg-12">
        <br/>
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2 class="pull-left"><i class="fa fa-bars"></i> Detil Sidang #<?php echo $model->Tanggal; ?></h2> 
                <div class="filter-block pull-right">                                                   
                    <?php echo CHtml::link('<i class="fa  fa-times-circle fa-lg"></i>', array('admin'), array('class' => 'btn btn-primary pull-left')); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">  
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array(
                                'name' => 'Tanggal Daftar',
                                'value' => $model->Tanggal,
                            ),
                        array(
                                'name' => 'Sidang',
                                'value' => $model->iDJenisSidang->NamaSidang,
                            ),
                        array(
                                'name' => 'TA',
                                'value' => $model->idTa->Tahun.' - '.$model->idTa->Semester,
                            ),
                        array(
                                'name' => 'status',
                                'value' => $model->ubahStatus(),
                            ),
                        array(
                                'name' => 'tglBuka',
                                'value' => $model->tglBuka,
                            ),
                        array(
                                'name' => 'tglTutup',
                                'value' => $model->tglTutup,
                            ),
                        
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>   

