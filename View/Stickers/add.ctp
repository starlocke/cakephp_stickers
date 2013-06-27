<div class="stickers form">
<?php echo $this->Form->create('Sticker'); ?>
	<fieldset>
		<legend><?php echo __('Add Sticker'); ?></legend>
	<?php
		echo $this->Form->input('color');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stickers'), array('action' => 'index')); ?></li>
	</ul>
</div>
