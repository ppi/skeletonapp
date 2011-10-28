<?php
if(isset($isAjax) && $isAjax == true):
	include_once($viewDir . $actionFile);
else:
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<script type="text/javascript">var baseUrl = "<?php echo $baseUrl; ?>";</script>
	<?php include_once($viewDir . 'framework/javascript.php'); ?>
	<?php include_once($viewDir . 'framework/stylesheet.php'); ?>
	<title>PPI framework | Open Source PHP Framework</title>

</head>

<body>
		<header>
			<h3>Header content here</h3>
		</header>

		<div id="wrapper" style="padding: 25px; 1px solid grey;">
		<?php include $viewDir . "framework/flashmessage.php" ?>
		<?php include_once($viewDir . $actionFile); ?>
		</div>

		<footer>
			<h3>Footer content here</h3>
		</footer>

	</body>
</html>
<?php endif; ?>