<div class="well crud-list" id="manage-talks">
<?php if(empty($talks)): ?>
	<h3>You have not created any talks yet. &nbsp; &nbsp; <a class="btn" href="<?=$baseUrl;?>manage/talks/create"><i class="icon-plus-sign"></i> Create Talk</a></h3>
<?php else: ?>
	
	<p>Create a talk: <a class="btn" href="<?=$baseUrl;?>manage/talks/create"><i class="icon-plus-sign"></i> Create Talk</a></p>
	
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>Title</th>
				<th>Duration</th>
				<th>Level</th>
				<th>Speaker</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($talks as $talk): ?>
			<tr>
				<td class="talk-title"><?=$helper->escape($talk->getTitle()); ?></td>
				<td><?=$helper->escape($talk->getDuration()); ?></td>
				<td><?=$helper->escape($talk->getLevel()); ?></td>
				<td><a href="<?=$baseUrl;?>manage/users/view/<?=$helper->escape($talk->getOwnerID()); ?>" title="<?=$helper->escape($talk->getOwnerName()); ?>"><?=$helper->escape($talk->getOwnerName()); ?></a></td>
				<td class="td-actions">
					<div class="btn-group actions-button">
						<a class="btn btn-primary view-button" href="<?=$baseUrl;?>manage/talks/view/<?=$talk->getID(); ?>"><i class="icon white user"></i> View</a>
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?=$baseUrl;?>manage/talks/edit/<?=$talk->getID(); ?>"><i class="icon-pencil"></i> Edit</a></li>
							<li><a href="<?=$baseUrl;?>manage/talks/delete/<?=$talk->getID(); ?>" onclick="return confirm('Are you sure? No going back now!');"><i class="icon-trash"></i> Delete</a></li>
						</ul>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</div>
