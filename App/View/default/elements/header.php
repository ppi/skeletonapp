
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a class="brand" href="<?=$baseUrl; ?>">PPI Skeleton Application</a>
		<div class="nav-collapse">

			<ul class="nav">
				<li class="<?=$request['controller'] == 'home' ? 'active' : ''; ?>"><a href="<?=$baseUrl; ?>">Home</a></li>
				<?php if($isLoggedIn): ?>
			
					<?php if($authUser->isAdmin()): ?>
					<li class="<?=$request['controller'] == 'manage' ? 'active' : ''; ?>"><a href="<?=$baseUrl; ?>manage" title="Manage">Manage</a></li>
					<?php endif; ?>
				<?php endif; ?>
			</ul>
			<ul class="nav pull-right">
				<?php if($isLoggedIn): ?>
				<li><p class="navbar-text">Logged in as <a href="<?= $baseUrl; ?>account"><?=$helper->escape($authUser->getFullName()); ?></a></p></li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?=$baseUrl;?>account">View Account</a></li>
						<li><a href="<?=$baseUrl; ?>account/edit">Edit Account</a></li>
						<li class="divider"></li>
						<li><a href="<?=$baseUrl;?>my/talks">My Talks</a></li>
						<li class="divider"></li>
						<li><a href="<?=$baseUrl;?>user/logout">Log out</a></li>
					</ul>
				</li>
				<?php else: ?>
				<li><a href="<?=$baseUrl;?>user/login">Login</a></li>
				<li><a href="<?=$baseUrl;?>user/signup">Signup</a></li>
				<?php endif; ?>
			</ul>
		</div><!-- /.nav-collapse -->
	</div>
	</div><!-- /navbar-inner -->
</div>
