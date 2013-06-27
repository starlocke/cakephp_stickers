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
	<script type="text/javascript" src="http://yui.yahooapis.com/combo?3.10.3/yui-base/yui-base-min.js&3.10.3/color-base/color-base-min.js&3.10.3/oop/oop-min.js&3.10.3/attribute-core/attribute-core-min.js&3.10.3/event-custom-base/event-custom-base-min.js&3.10.3/event-custom-complex/event-custom-complex-min.js&3.10.3/attribute-observable/attribute-observable-min.js&3.10.3/attribute-extras/attribute-extras-min.js&3.10.3/attribute-base/attribute-base-min.js&3.10.3/base-core/base-core-min.js&3.10.3/base-observable/base-observable-min.js&3.10.3/base-base/base-base-min.js&3.10.3/pluginhost-base/pluginhost-base-min.js&3.10.3/pluginhost-config/pluginhost-config-min.js&3.10.3/base-pluginhost/base-pluginhost-min.js&3.10.3/base-build/base-build-min.js&3.10.3/features/features-min.js&3.10.3/dom-core/dom-core-min.js&3.10.3/dom-base/dom-base-min.js&3.10.3/selector-native/selector-native-min.js&3.10.3/selector/selector-min.js&3.10.3/node-core/node-core-min.js&3.10.3/node-base/node-base-min.js&3.10.3/event-base/event-base-min.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/combo?3.10.3/event-delegate/event-delegate-min.js&3.10.3/node-event-delegate/node-event-delegate-min.js&3.10.3/node-pluginhost/node-pluginhost-min.js&3.10.3/dom-style/dom-style-min.js&3.10.3/dom-screen/dom-screen-min.js&3.10.3/node-screen/node-screen-min.js&3.10.3/node-style/node-style-min.js&3.10.3/selector-css2/selector-css2-min.js&3.10.3/selector-css3/selector-css3-min.js&3.10.3/yui-throttle/yui-throttle-min.js&3.10.3/frame/frame-min.js&3.10.3/editor-selection/editor-selection-min.js&3.10.3/exec-command/exec-command-min.js&3.10.3/editor-base/editor-base-min.js&3.10.3/editor-para-base/editor-para-base-min.js&3.10.3/editor-para/editor-para-min.js&3.10.3/editor-br/editor-br-min.js&3.10.3/editor-bidi/editor-bidi-min.js&3.10.3/editor-tab/editor-tab-min.js&3.10.3/createlink-base/createlink-base-min.js&3.10.3/color-hsl/color-hsl-min.js&3.10.3/color-harmony/color-harmony-min.js&3.10.3/intl-base/intl-base-min.js&3.10.3/intl/intl-min.js&3.10.3/dial/lang/dial.js"></script>
	<script type="text/javascript" src="http://yui.yahooapis.com/combo?3.10.3/attribute-complex/attribute-complex-min.js&3.10.3/classnamemanager/classnamemanager-min.js&3.10.3/event-synthetic/event-synthetic-min.js&3.10.3/event-focus/event-focus-min.js&3.10.3/widget-base/widget-base-min.js&3.10.3/widget-htmlparser/widget-htmlparser-min.js&3.10.3/widget-skin/widget-skin-min.js&3.10.3/widget-uievents/widget-uievents-min.js&3.10.3/dd-ddm-base/dd-ddm-base-min.js&3.10.3/dd-drag/dd-drag-min.js&3.10.3/event-mouseenter/event-mouseenter-min.js&3.10.3/event-touch/event-touch-min.js&3.10.3/event-move/event-move-min.js&3.10.3/event-key/event-key-min.js&3.10.3/transition/transition-min.js&3.10.3/dial/dial-min.js"></script>
</head>
<body class="clearfix">
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<article class="sticker template">
		<section>
		</section>
		<footer class="controls">
			<button class="color">Color</button>
			<button class="delete">Delete</button>
		</footer>
	</article>
	<nav>
		<button id="add-sticker">Add</button>
	</nav>
</body>
</html>
