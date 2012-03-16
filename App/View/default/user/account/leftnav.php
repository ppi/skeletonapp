<div class="well sidebar-nav" style="padding: 0px;">
	<ul class="nav nav-list">
		<li class="nav-header">Account Management</li>
		<li class="<?= $request['method'] == 'showaccount' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl; ?>account"><i class="icon-user"></i> View Account</a>
		</li>
		<li class="<?= $request['method'] == 'editaccount' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl;?>account/edit"><i class="icon-pencil"></i> Edit Account</a>
		</li>
		<li class="<?= $request['method'] == 'editpassword' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl;?>account/edit/password"><i class="icon-cog"></i> Edit Password</a>
		</li>
	</ul>
</div>