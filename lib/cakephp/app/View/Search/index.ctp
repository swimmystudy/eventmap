<div class="row-fluid">
	<div class="span9">
		<h2>Search</h2>
		<?php echo $this->Form->create(false,array('action'=>'request','type'=>'get'));?>
		<?php echo $this->Form->input('keyword');?>
		<?php echo $this->Form->input('type',array(
				'type'=>'radio',
				'options'=>array('or'=>'or','and'=>'and')
		));?>
		<?php echo $this->Form->input('date',array(
				'value'=>'2012/10'
		));?>
		<?php echo $this->Form->input('place',array(
				'type'=>'select',
				'options'=>array('福岡'=>'福岡','長崎'=>'長崎','佐賀'=>'佐賀')
		));?>
		<?php echo $this->Form->end('submit');?>

	</div>
</div>