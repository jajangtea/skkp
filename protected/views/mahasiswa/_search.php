<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="main-box">
        <header class="main-box-header clearfix">
            <h2 class="pull-left"><i class="fa fa-bars"></i> Pencarian</h2>
            <div class="icon-box pull-right">                                       
                <a class="btn pull-left" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </header> 
        <div class="main-box-body clearfix">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                               <?php echo $form->textField($model,'NIM',array('class' => 'form-control', 'style' => 'width:30%'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo $form->textField($model,'Nama',array('class' => 'form-control', 'style' => 'width:60%'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Handphone :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                               <?php echo $form->textField($model,'Tlp',array('class' => 'form-control', 'style' => 'width:40%'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Prodi :</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-10">        
                                <?php echo $form->textField($model,'KodeJurusan',array('class' => 'form-control', 'style' => 'width:40%'));?>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php
                            echo CHtml::tag('button', array('name' => 'btnSubmit', 'type' => 'submit', 'class' => 'btn btn-info'), '<i class="fa fa-search"></i> Search');
                        ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>



<?php $this->endWidget(); ?>
