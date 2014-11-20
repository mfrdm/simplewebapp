<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span9">
	<div id="content">
	<?php if(isset($this->breadcrumbs)): ?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
			'homeLabel' => '<i class="icon icon-home"></i>',
			'divider'=>'|',
			'links' => $this->breadcrumbs,
			'encodeLabel' => true,
		)); 
		?> 
	<?php endif?>		
	<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span3">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
	<hr>
</div>
<?php $this->endContent(); ?>