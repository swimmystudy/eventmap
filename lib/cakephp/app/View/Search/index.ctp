<script type="text/javascript">
$(function(){
    $("#requestForm").submit(function() {
        $('#loading').fadeIn(200);
        $.ajax({
        type:"get",
        url: $(this).attr('action') + '?' + $(this).serialize(),
        success:function(data,status){
            $('#loading').fadeOut(200);
            $("#result").html(data);
        }
        });
        return false;
    });
});
</script>
<div class="container-fluid">
	<h1>イベントマッププロジェクト</h1>
	<div class="row-fluid">
	<?php echo $this->Form->create(false,array('action'=>'dummy','type'=>'get'));?>
		<fieldset class="form-inline control-group">
			<input type="text" name="keyword" value="" >
			<label for="or" class="radio">
			<input type="radio" value="or" name="search_type" id="or" checked="checked">or</label>
			<label for="and" class="radio"><input type="radio" value="and" name="search_type" id="and">and</label>
		</fieldset>
		<fieldset class="form-inline control-group">
			<input type="date" value="">
			<input type="date" value="">
			<?php echo $this->Form->input('pref',array(
				'type'=>'select',
				'options'=>Configure::read('pref'),
				'label'=>false,
			));?>
		</fieldset>
		<fieldset class="form-inline control-group">
			<?php echo $this->Form->input('type',array(
					'type'=>'radio',
					'options'=>array(
							'atend'=>'atend',
							'zusaar'=>'zusaar',
							'connpass'=>'connpass'
					),
			));?>
			<!--div class="btn-group" data-toggle="buttons-checkbox">
				<button class="btn" value="atend">atend</button>
				<button class="btn" value="zusaar">zusaar</button>
				<button class="btn" value="connpass">connpass</button>
			</div-->
		</fieldset>
		<div class="control-group">
			<?php echo $this->Form->submit('検索',array('class'=>'btn btn-primary'));?>
		</div>
		<?php echo $this->Form->end();?>
		<div id="loading" style="display:none;"><img src="img/loading.gif" /></div>
		<div id="result">
		</div>
	</div>
</div>
