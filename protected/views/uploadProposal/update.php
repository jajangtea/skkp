<?php
/* @var $this UploadProposalController */
/* @var $model UploadProposal */

$this->breadcrumbs=array(
	'Upload Proposals'=>array('index'),
	$model->idUpload=>array('view','id'=>$model->idUpload),
	'Update',
);

$this->menu=array(
	array('label'=>'List UploadProposal', 'url'=>array('index')),
	array('label'=>'Create UploadProposal', 'url'=>array('create')),
	array('label'=>'View UploadProposal', 'url'=>array('view', 'id'=>$model->idUpload)),
	array('label'=>'Manage UploadProposal', 'url'=>array('admin')),
);
?>

<h1>Update UploadProposal <?php echo $model->idUpload; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>