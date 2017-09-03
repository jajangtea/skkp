<?php
/* @var $this UploadProposalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Upload Proposals',
);

$this->menu=array(
	array('label'=>'Create UploadProposal', 'url'=>array('create')),
	array('label'=>'Manage UploadProposal', 'url'=>array('admin')),
);
?>

<h1>Upload Proposals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
