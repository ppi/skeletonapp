<div class="well view-talk">
	<h2><?= $helper->escape($user->getFullName()); ?></h2>
	<?php if($user->hasJobTitle()): ?>
	<p><b><?= $helper->escape($user->getJobTitle()); ?> at <?=$helper->escape($user->getCompanyName()); ?></b></p>
	<?php endif; ?>
	
	<div class="btn-group actions-button">
		<a class="btn btn-primary view-button" href="<?=$baseUrl;?>manage/users/edit/<?=$user->getID(); ?>"><i class="icon white user"></i> Edit</a>
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="<?=$baseUrl;?>manage/users/delete/<?=$user->getID(); ?>" onclick="return confirm('Are you sure? No going back now!');"><i class="icon-trash"></i> Delete</a></li>
		</ul>
	</div>
	
	<dl class="user-info">
		
		<dt>Email</dt>
		<dd><?=$helper->escape($user->getEmail()); ?></dd>
		
		<?php if($user->getCountry()): ?>
		<dt>Country</dt>
		<dd><?=$helper->escape($user->getCountry()); ?></a></dd>
		<?php endif ;?>
		
		<?php if($user->getWebsite()): ?>
		<dt>Website</dt>
		<dd><a href="<?= $helper->escape($user->getWebsite()); ?>" title="Click to go to the website" target="_blank"><?= $helper->escape($user->getWebsite()); ?></a></dd>
		<?php endif ;?>
			
		<?php if($user->hasTwitterHandle()): ?>
		<dt>Twitter</dt>
		<dd><a href="http://www.twitter.com/<?= $helper->escape($user->getTwitterHandle()); ?>" 
			   target="_blank">@<?=$helper->escape($user->getTwitterHandle()); ?></a></dd>
		<?php endif; ?>
		
	</dl>

	<hr>
	
	<?php if($user->hasBio()): ?>
	<h3><b>Biography</b></h3>
	<p><?= nl2br($helper->escape($user->getBio())); ?></p>
	<?php endif; ?>
</div>