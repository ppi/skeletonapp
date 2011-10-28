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

		<div id="body-wrapper">

			<div id="sidebar">

				<div id="sidebar-wrapper">

					<h1 id="sidebar-title"><a href="<?php echo $baseUrl; ?>">Administration</a></h1>

					<a href="#"><img id="logo" src="<?php echo $baseUrl; ?>images/admin-title.png" alt="Simpla Admin logo"></a>

					<div id="profile-links">
						Hello, <a href="#" title="Edit your profile"><?php echo $authInfo['first_name'] . ' ' . $authInfo['last_name']; ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br>
						<br>
						<a href="<?php echo $baseUrl; ?>" title="View the Site">View the Site</a> | <a href="<?php echo $baseUrl; ?>user/logout" title="Sign Out">Sign Out</a>
					</div>

					<ul id="main-nav">
						<li>
							<a href="#" class="nav-top-item" id="main-nav-user" style="padding-right: 15px; ">Users</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>admin/user" title="">Management</a></li>
								<li><a href="<?php echo $baseUrl; ?>admin/user/roles" title="">Roles</a></li>
<!--								<li><a href="<?php echo $baseUrl; ?>" title="">Permissions</a></li>-->
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item" id="main-nav-blog" style="padding-right: 15px; ">Blog</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>admin/blog" title="">Management</a></li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px; ">Logs</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>">Email</a></li>
								<li><a href="<?php echo $baseUrl; ?>">Audit</a></li>
								<li><a href="<?php echo $baseUrl; ?>">Errors</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px; ">Email</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>">Templates</a></li>
								<li><a href="<?php echo $baseUrl; ?>">Logs</a></li>
							</ul>

						</li>
						<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px; ">Forms</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>" title="">Management</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px; ">Settings</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>" title="">Routes</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item" style="padding-right: 15px; ">Image Bunker</a>
							<ul>
								<li><a href="<?php echo $baseUrl; ?>" title="">Management</a></li>
								<li><a href="<?php echo $baseUrl; ?>" title="">Upload Images</a></li>
								<li><a href="<?php echo $baseUrl; ?>" title="">Bunker Settings</a></li>
							</ul>
						</li>


					</ul>


				</div>
			</div>
			<div id="main-content">
				<?php include $viewDir . "framework/flashmessage.php" ?>
				<?php include_once($viewDir . $actionFile); ?>
			</div>

		</div>


	</body>
</html>
<?php endif; ?>
