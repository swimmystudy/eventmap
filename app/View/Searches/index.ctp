<div class="row-fluid">
	<div class="span12">
		<h2><?php echo $this->Html->link('Event Map', array('action' => 'index')) ?></h2>

		<?php echo $this->Form->create('Search', array('action'=>'index', 'class' => 'form-horizontal')); ?>
		<fieldset>
			<legend>検索条件</legend>
			<?php echo $this->Form->input('Search.title', array('label' => 'イベント名')); ?>
			<div class="control-group">
				<?php echo $this->Form->label('Search.started_at', '対象期間', array('class' => 'control-label')); ?>
				<div class="controls">
				<?php echo $this->Form->text('from'); ?>
				<?php echo $this->Form->text('to'); ?>
				<?php echo $this->Form->error('from'); ?>
				<?php echo $this->Form->error('to'); ?>
				</div>
			</div>
		</fieldset>
		<?php echo $this->Form->end('検索'); ?>

        <script>
        $(function() {
            $("#SearchFrom").datepicker({
                defaultDate: "+1w",
                changeMonth: false,
                numberOfMonths: 2,
	    		dateFormat: "yy-mm-dd",
                showOtherMonths: true,
                selectOtherMonths: true,
                minDate: 0,
                onClose: function(s) {
	    			$("#SearchTo").datepicker("option", "minDate", s).focus();
                }
            });
            $("#SearchTo").datepicker({
                defaultDate: "+1w",
                changeMonth: false,
                numberOfMonths: 2,
	    		dateFormat: "yy-mm-dd",
                showOtherMonths: true,
                selectOtherMonths: true,
                minDate: 0,
                onClose: function(s) {
                    $("#SearchFrom").datepicker("option", "maxDate", s);
                }
            });
        });
        </script>

		<table class="table table-hover table-bordered">
			<tr>
				<th><?php echo $this->Paginator->sort('id', 'ID');?></th>
				<th><?php echo $this->Paginator->sort('title', 'イベント名');?></th>
				<th><?php echo $this->Paginator->sort('started_at', '開始日');?></th>
				<th><?php echo $this->Paginator->sort('ended_at', '終了日');?></th>
			</tr>
		<?php foreach ($searches as $post): ?>
			<tr>
				<td><?php echo h($post['Search']['id']); ?></td>
				<td><?php echo $this->Html->link(h($post['Search']['title']), array('action' => 'view', $post['Search']['id'])); ?></td>
				<td><?php echo h($post['Search']['started_at']); ?></td>
				<td><?php echo h($post['Search']['ended_at']); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>
</div>