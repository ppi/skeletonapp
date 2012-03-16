<div class="container">
	<div class="row">
		<?php if($viewingOwnProfile): ?>
		<div class="span3">
			<?php include($viewDir . 'user/account/leftnav.php'); ?>
		</div>
		<?php endif; ?>
		<div class="span9" style="margin-left: 20px">
			<?php include($viewDir . 'user/account/' . $subPage . '.php'); ?>
		</div>
	</div>
</div>