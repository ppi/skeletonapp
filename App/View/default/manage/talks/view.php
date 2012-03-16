<div class="well view-talk">
	<h1><?= $helper->escape($talk->getTitle()); ?></h1>
	
	<div class="btn-group actions-button">
		<a class="btn btn-primary view-button" href="<?=$baseUrl;?>manage/talks/edit/<?=$talk->getID(); ?>"><i class="icon white user"></i> Edit</a>
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="<?=$baseUrl;?>manage/talks/delete/<?=$talk->getID(); ?>" onclick="return confirm('Are you sure? No going back now!');"><i class="icon-trash"></i> Delete</a></li>
		</ul>
	</div>
	
	<dl class="user-info">
		
		<dt>Speaker</dt>
		<dd><a href="<?=$baseUrl;?>manage/users/view/<?=$helper->escape($talkOwner->getID()); ?>" title="Click to see profile of: <?=$helper->escape($talkOwner->getFullName()); ?>"><?=$helper->escape($talkOwner->getFullName()); ?></a></dd>
		
		<?php if($talk->hasDuration()): ?>
		<dt>Duration</dt>
		<dd><?=$helper->escape($talk->getDuration()); ?> minutes</dd>
		<?php endif ;?>
		
		<?php if($talk->hasLevel()): ?>
		<dt>Level</dt>
		<dd><?=$helper->escape($talk->getLevel()); ?></dd>
		<?php endif ;?>
		
		<?php if($talk->hasSlidesUrl()): ?>
		<dt>Slides Url</dt>
		<dd><?=$helper->escape($talk->getSlidesUrl()); ?></dd>
		<?php endif ;?>
		
	</dl>

	<?php if($talk->hasAbstract()): ?>
	<hr>
	<h3><b>Abstract</b></h3>
	<p><?= nl2br($helper->escape($talk->getAbstract())); ?></p>
	<?php endif; ?>


	<?php if($talk->hasRemark()): ?>
	<hr>
	<h3><b>Remark</b></h3>
	<p><?= nl2br($helper->escape($talk->getRemark())); ?></p>
	<?php endif; ?>
	
</div>
