 <?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Change Password',
);

?>

<h1>Change Password</h1>

<div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
)); ?>

    <?php echo $form->errorSummary($data); ?>
    <table>
        <tr>
            <td><?php echo 'Your Current Password :'; ?></td>
            <td>
                <?php echo CHtml::passwordField('old','',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo 'New Password :'; ?></td>
            <td>
                <?php echo CHtml::passwordField('baru1','',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo 'Confirmation Your New Password :'; ?></td>
            <td>
                <?php echo CHtml::passwordField('baru2','',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                 <?php echo CHtml::submitButton('Ubah Password',array('class'=>'btn btn-primary')); ?>
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>
</div><!-- form -->