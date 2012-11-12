<div class="row-fluid">
	<div class="span12">
		<h2><?php echo $this->Html->link('Event Map', array('action' => 'index')) ?></h2>

		<dl class="dl-horizontal">
			<dt><?php echo __('Id'); ?></dt>
			<dd><?php echo h($search['Search']['id']); ?></dd>
			<dt><?php echo __('タイトル'); ?></dt>
			<dd><?php echo h($search['Search']['title']); ?></dd>
			<dt><?php echo __('内容'); ?></dt>
			<dd><?php echo h($search['Search']['description']); ?></dd>
			<dt><?php echo __('日時'); ?></dt>
			<dd><?php echo h($search['Search']['started_at']); ?>〜<?php echo h($search['Search']['ended_at']); ?></dd>
			<dt><?php echo __('場所'); ?></dt>
			<dd><?php echo h($search['Search']['place']); ?></dd>
			<dt><?php echo __('URL'); ?></dt>
			<dd><?php echo h($search['Search']['event_url']); ?></dd>
		</dl>

	</div>
</div>
