<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('ux/jquery-ui-1.10.3.custom.min');
		echo $this->Html->css('stickers');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" media="screen and min-device-pixel-ratio: 2" href="/css/stickers-highres.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="/js/jquery-1.9.1.js"></script>
	<script src="/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="/js/stickers.js"></script>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<nav>
		<button>Add</button>
	</nav>
</body>
</html>
