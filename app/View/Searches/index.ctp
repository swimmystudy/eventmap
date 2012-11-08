<div class="row-fluid">
	<div class="span12">
		<h2><?php echo __('List %s', __('Events'));?></h2>

		<table class="table table-hover table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('id', 'ID');?></th>
				<th><?php echo $this->Paginator->sort('title', 'イベント名');?></th>
				<th><?php echo $this->Paginator->sort('started_at', '開始日');?></th>
				<th><?php echo $this->Paginator->sort('ended_at', '終了日');?></th>
			</tr>
		<?php foreach ($searches as $search): ?>
			<tr>
				<td><?php echo h($search['Search']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link(h($search['Search']['title']), array('action' => 'view', $search['Search']['id'])); ?></td>
				<td><?php echo h($search['Search']['started_at']); ?>&nbsp;</td>
				<td><?php echo h($search['Search']['ended_at']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>
</div>