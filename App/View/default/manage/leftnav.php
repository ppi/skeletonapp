<div class="well sidebar-nav" style="padding: 0px;">
	<ul class="nav nav-list">
		<li class="nav-header">Management</li>
		<li class="<?= $section == 'users' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl; ?>manage/users"><i class="icon-user"></i> Users</a>
		</li>
		<li class="<?= $section == 'content' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl; ?>manage/content"><i class="icon-text-width"></i> Content</a>
		</li>
	</ul>
</div>