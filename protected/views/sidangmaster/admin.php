<?php
/* @var $this SidangmasterController */
/* @var $model Sidangmaster */

$this->breadcrumbs = array(
    'Sidangmaster' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Sidang', 'url' => array('create')),
);
?>

<hr/>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button'));  ?>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'sidangmaster-grid',
    'selectableRows'=>2,  
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
       array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'checked' =>'CHtml::encode($data->ubahStatus())',
            'id' => 'idsidang',
            'name'=>'IdSidang',
        ),
        'Tanggal',
        'iDJenisSidang.NamaSidang',
        array(
            'name' => 'status',
            //'filter' => CHtml::activeDropDownList($model, 'status', $model->jenisStatus(), array('prompt' => 'Pilih', 'class' => 'form-control')),
            'type' => 'raw',
            'header' => 'Status',
            'value' => 'CHtml::encode($data->kondisiStatus())',
            'htmlOptions' => array('width' => ''),
        ),
        'tglBuka',
        'tglTutup',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));



?>
<?php
Yii::app()->clientScript->registerCoreScript('bbq');
echo CHtml::ajaxButton('Confirm', array('sidangmaster/getValue'), array(
    'type' => 'POST',
    'data' => 'js:{value : $.fn.yiiGridView.getChecked("sidangmaster-grid","idsidang")}',
     'success'=>'js:function(data){
                 $.fn.yiiGridView.update("sidangmaster-grid");
    }'
    
));
?>
<div id="hasil">..</div>
<script>
  function allFine(data)
  {
      $("#hasil").html(data);
      $.fn.yiiGridView().update('sidangmaster-grid');
  }
</script>
<?php
echo CHtml::ajaxButton('Confirm Ajax', yii::app()->createUrl('sidangmaster/getValue'), array('success'=> 'allFine'));
?>

