<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<?php
			echo $this->Html->css('bootstrap');
			echo $this->Html->css('bootstrap-responsive');
			echo $this->Html->css('http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css');
			echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
			echo $this->Html->script('bootstrap.min');
			echo $this->Html->script('http://code.jquery.com/ui/1.9.1/jquery-ui.js');
			echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
</head>
<body>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

		<div id="footer">
		</div>
	<?php echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>
