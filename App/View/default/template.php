<?php
if(isset($isAjax) && $isAjax == true):
	include $viewDir . $actionFile;
	return;
endif;
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>	<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>	<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include($viewDir . 'elements/head.php'); ?>
<body>
	<?php include($viewDir . 'elements/header.php'); ?>
	<div id="wrapper">
		<?php include $viewDir . 'framework/flashmessage.php' ?>
		<?php include $viewDir . $actionFile; ?>
	</div>
	<?php include($viewDir . 'elements/footer.php'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= $baseUrl; ?>scripts/libs/jquery-1.6.2.min.js"><\/script>')</script>
	<?php include($viewDir . 'framework/javascript.php'); ?>
</body>
</html>
