<div class="well crud-list">
<?php if(empty($allContent)): ?>
	<h3>You have not created any content yet. &nbsp; &nbsp; <a class="btn" href="<?=$baseUrl;?>manage/content/create"><i class="icon-plus-sign"></i> Create Content</a></h3>
<?php else: ?>
	
	<p>Create content: <a class="btn" href="<?=$baseUrl;?>manage/content/create"><i class="icon-plus-sign"></i> Create Content</a></p>
	
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($allContent as $content): ?>
			<tr>
				<td><h4><?=$helper->escape($content->getTitle()); ?></h4></td>
				<td class="actions">
					<div class="btn-group actions-button">
						<a class="btn btn-primary view-button" href="<?=$baseUrl;?>manage/content/view/<?=$content->getID(); ?>"><i class="icon white user"></i> View</a>
						<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?=$baseUrl;?>manage/content/edit/<?=$content->getID(); ?>"><i class="icon-pencil"></i> Edit</a></li>
							<li><a href="<?=$baseUrl;?>manage/content/delete/<?=$content->getID(); ?>" onclick="return confirm('Are you sure? No going back now!');"><i class="icon-trash"></i> Delete</a></li>
						</ul>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</div>
