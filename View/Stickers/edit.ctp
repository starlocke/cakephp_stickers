<div class="stickers form">
<?php echo $this->Form->create('Sticker'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sticker'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('color');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sticker.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sticker.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stickers'), array('action' => 'index')); ?></li>
	</ul>
</div>
