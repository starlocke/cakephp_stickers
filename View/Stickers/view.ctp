<div class="stickers view">
<h2><?php  echo __('Sticker'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sticker['Sticker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($sticker['Sticker']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($sticker['Sticker']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sticker'), array('action' => 'edit', $sticker['Sticker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sticker'), array('action' => 'delete', $sticker['Sticker']['id']), null, __('Are you sure you want to delete # %s?', $sticker['Sticker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stickers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sticker'), array('action' => 'add')); ?> </li>
	</ul>
</div>
