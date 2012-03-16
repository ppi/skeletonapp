<div class="well">
	<h2><?= $helper->escape($userAccount->getFullName()); ?></h2>
	<?php if($userAccount->hasJobTitle()): ?>
	<p><b>
		<?= $helper->escape($userAccount->getJobTitle()); ?>
		<?php if($userAccount->hasCompanyName()): ?>
			at <?=$helper->escape($userAccount->getCompanyName()); ?>
		<?php endif; ?>
	</b></p>
	<?php endif; ?>
	
	<dl class="user-info">
		
		<dt>Email</dt>
		<dd><?=$helper->escape($userAccount->getEmail()); ?></dd>
		
		<?php if($userAccount->getCountry()): ?>
		<dt>Country</dt>
		<dd><?=$helper->escape($userAccount->getCountry()); ?></a></dd>
		<?php endif ;?>
		
		<?php if($userAccount->getWebsite()): ?>
		<dt>Website</dt>
		<dd><a href="<?= $helper->escape($userAccount->getWebsite()); ?>" title="Click to go to the website" target="_blank"><?= $helper->escape($userAccount->getWebsite()); ?></a></dd>
		<?php endif ;?>
			
		<?php if($userAccount->hasTwitterHandle()): ?>
		<dt>Twitter</dt>
		<dd><a href="http://www.twitter.com/<?= $helper->escape($userAccount->getTwitterHandle()); ?>" 
			   target="_blank">@<?=$helper->escape($userAccount->getTwitterHandle()); ?></a></dd>
		<?php endif; ?>
		
	</dl>

	<hr>
	
	<?php if($userAccount->hasBio()): ?>
	<h3><b>Biography</b></h3>
	<p><?= nl2br($helper->escape($userAccount->getBio())); ?></p>
	<?php endif; ?>
</div>