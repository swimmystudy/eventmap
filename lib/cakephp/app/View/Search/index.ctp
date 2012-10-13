<div class="row-fluid">
	<div class="span9">
		<h2>Search</h2>
		<?php echo $this->Form->create(false,array('action'=>'request','type'=>'get'));?>
		<?php echo $this->Form->input('keyword');?>
		<?php echo $this->Form->input('type',array(
				'type'=>'radio',
				'options'=>array('or'=>'or','and'=>'and')
		));?>
		<?php echo $this->Form->input('start_day',array(
				'value'=>'2012/10/01'
		));?>
		<?php echo $this->Form->input('end_day',array(
				'value'=>'2012/11/01'			
		));?>

		<?php echo $this->Form->end('submit');?>

	</div>
</div>