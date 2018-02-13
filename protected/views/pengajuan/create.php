<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */

$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Proposal',
);

$this->menu=array(
        array('label'=>'Data Pengajuan', 'url'=>array('viewlengkap','NIM'=>Yii::app()->user->getUsername()),'visible' => Yii::app()->user->getLevel() != 1),
        array('label'=>'Data Pengajuan', 'url'=>array('admin'),'visible' => Yii::app()->user->getLevel() == 1),
);
?>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('_form', array('model'=>$model,'IDPengajuan'=>$IDPengajuan,'IDJenisSidang'=>$IDJenisSidang,true)); ?>