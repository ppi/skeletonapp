<html>

    <head>
        <title>Error occured</title>
        <link src="<?=$view['assets']->getUrl('css/twitter-bootstrap-2.0.4.css');?>">
        <?php $view['slots']->output('include_css'); ?>
    </head>

	<body>
	
		<div class="content">
			<?php $view['slots']->output('_content'); ?>
		</div>
	
	</body>

</html>
