<div class="content-box">
	<div class="content-box-header"><h3 style="cursor: s-resize; ">Blog Management</h3></div>
	<div class="content-box-content" style="display: block; ">
		<div class="tab-content default-tab" style="display: block; position: relative;">
		
			<p><a class="button" href="<?php echo $baseUrl; ?>admin/blog/create">Create new blog post</a></p>
		    <table cellspacing="0" class="widefat fixed fullsize custom-table" id="admin_pages_menu">
		    
		        <thead>
			        <tr class="thead">
			        	<th style="" class="manage-column column-title" id="username" scope="col">Title<br><span class="column-permalink">Permalink</span></th>
			        	<th style="" class="manage-column column-created" id="name" scope="col">Created</th>
			        	<th style="" class="manage-column column-by" id="email" scope="col">By</th>
			        	<th style="" class="manage-column column-published" id="role" scope="col">Published</th>
			        </tr>
		        </thead>

		        <tbody class="list:user page-list" id="users">
		            <?php
		            $i = 0;
		            foreach($posts as $post):
		            ?>
		            	<tr>
		                    <td class="username column-title">
		                        <strong>
		                        <span><?php echo $post['title']; ?><br><span style="color: #AAA;"><?php echo $post['permalink']; ?></span></span>
		                        <div class="row-actions">
		                            <span class="edit"><a href="<?php echo $baseUrl; ?>admin/blog/edit/<?php echo $post['id'] ?>">Edit</a></span>
		                            &nbsp;|&nbsp;<span class="edit"><a onclick="return confirm('Are you sure? No going back now.');" href="<?php echo $baseUrl; ?>admin/blog/delete/<?php echo $post['id']; ?>">Delete</a>
		                        </div>
		                    </td>
		                    <td class="name column-created"><?php echo date('F jS, Y', $post['created']); ?></td>
		                    <td class="role column-by"><?php echo $post['first_name'] ?> <?php echo $post['last_name']; ?></td>		                    
		                    <td class="role column-published"><?php echo $post['published'] == 1 ? 'Yes' : 'No'; ?></td>
		                </tr>
		            <?php
		            $i++;
		            endforeach;
		            ?>
		        </tbody>

		    </table>

		</div>
	</div>
</div>
    

<style type="text/css">
.column-permalink {
	font-size: 0.8em;
	color: #AAA;
}
.column-published {
	width: 20px;
}
.column-created {
	width: 150px;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function() {
	$('#main-nav-blog').addClass('current').trigger('click');
});
</script>
