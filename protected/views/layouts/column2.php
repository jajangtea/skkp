<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	
</div>
<div class="span-5 last">
	<div id="content">
	<?php
//		$this->beginWidget('zii.widgets.CPortlet', array(
//			'title'=>'Operations',
//		));
//		$this->widget('zii.widgets.CMenu', array(
//			'items'=>$this->menu,
//			'htmlOptions'=>array('class'=>'operations'),
//		));
//		$this->endWidget();
			if(Yii::app()->user->getLevel()<=2)
			{
				$this->widget('ext.bootstrap.widgets.BootMenu', array(
					'type'=>'tabs',
					'items'=>$this->menu,
				));
			}
	?>
        <?php echo $content; ?>    
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>