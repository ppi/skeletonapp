<div id="icon-users" class="icon32"><br /></div>

<div class="wrap">
	<?php if(isset($bEdit)): ?>
	<h2>Edit User</h2>
	<?php else: ?>
	<h2>Add New User</h2>
	<?php endif; ?>
</div>

<?php include_once($viewDir . 'formrenderer.php');