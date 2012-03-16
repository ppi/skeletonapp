<div class="well crud-list">
<?php if(empty($users)): ?>
	<h3>You have not created any users yet. &nbsp; &nbsp; <a class="btn" href="<?=$baseUrl;?>manage/users/create"><i class="icon-plus-sign"></i> Create User</a></h3>
<?php else: ?>
	
	<p>Create a talk: <a class="btn" href="<?=$baseUrl;?>manage/users/create"><i class="icon-plus-sign"></i> Create User</a></p>
	
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>Title</th>
				<th>Username</th>
				<th>Email</th>
				<th>Twitter</th>
				<th>Job Title</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?=$helper->escape($user->getFullName()); ?></td>
				<td><?=$helper->escape($user->getUsername()); ?></td>
				<td><?=$helper->escape($user->getEmail()); ?></td>
				<?php if($user->hasTwitterHandle()): ?>
				<td><a target="_blank" href="http://www.twitter.com/<?=$helper->escape($user->getTwitterHandle()); ?>"><?=$helper->escape('@' . $user->getTwitterHandle()); ?></a></td>
				<?php else: ?>
				<td>&nbsp;</td>
				<?php endif; ?>
				<td><?=$helper->escape($user->getJobTitle()); ?></td>
				<td class="actions">
					<div class="btn-group actions-button">
						<a class="btn btn-primary view-button" href="<?=$baseUrl;?>manage/users/view/<?=$user->getID(); ?>"><i class="icon white user"></i> View</a>
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?=$baseUrl;?>manage/users/edit/<?=$user->getID(); ?>"><i class="icon-pencil"></i> Edit</a></li>
							<li><a href="<?=$baseUrl;?>manage/users/delete/<?=$user->getID(); ?>" onclick="return confirm('Are you sure? No going back now!');"><i class="icon-trash"></i> Delete</a></li>
						</ul>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</div>
