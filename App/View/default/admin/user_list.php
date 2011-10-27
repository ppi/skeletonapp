<div class="content-box">
	<div class="content-box-header"><h3 style="cursor: s-resize; ">User Management</h3></div>
	<div class="content-box-content" style="display: block; ">
		<div class="tab-content default-tab" style="display: block; position: relative;">

			<p><a class="button" href="<?php echo $baseUrl; ?>admin/user/create">Create new user</a></p>
			<?php if($sFilteredBy !== null) { ?>
			<div style="position: absolute; right: 10px; top: 10px;">Filtering by: <?php echo $sFilteredBy; ?> <a href="<?php echo $baseUrl; ?>admin/user" title="Clear filter"><b>Clear Filter</b></a></div>
			<?php } ?>

		    <table cellspacing="0" class="widefat fixed custom-table fullsize" id="admin_users_menu">
		        <thead>
			        <tr class="thead">
		<!--	        	<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" /></th>-->
			        	<th style="" class="manage-column column-username" id="username" scope="col">Username</th>
			        	<th style="" class="manage-column column-name" id="name" scope="col">Name</th>
			        	<th style="" class="manage-column column-email" id="email" scope="col">E-mail</th>
			        	<th style="" class="manage-column column-role" id="role" scope="col">Role</th>
			        	<th style="" class="manage-column column-posts num" id="posts" scope="col">Registered</th>
			        </tr>
		        </thead>
		<!--
		        <tfoot>
		        <tr class="thead">
		        	<th style="" class="manage-column column-cb check-column" scope="col"><input type="checkbox" /></th>
		        	<th style="" class="manage-column column-username" scope="col">Username</th>
		        	<th style="" class="manage-column column-name" scope="col">Name</th>
		        	<th style="" class="manage-column column-email" scope="col">E-mail</th>
		        	<th style="" class="manage-column column-role" scope="col">Role</th>
		        	<th style="" class="manage-column column-posts num" scope="col">Registered</th>
		        </tr>
		        </tfoot>
		-->
		        <tbody class="list:user user-list" id="users">
		            <?php
		            $i = 0;
		            foreach($users as $user):

		            ?>

		            	<tr class="" id="user-1">
		<!--                    <th class="check-column" scope="row"><input type="checkbox" value="1" class="administrator" id="user_1" name="users[]" /></th>-->
		                    <td class="username column-username">
		                        <strong><a href="<?php echo $baseUrl; ?>admin/user/view/<?php echo $user['id']; ?>"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></a></strong><br />
		                        <div class="row-actions">
		                            <span class="edit"><a href="<?php echo $baseUrl; ?>admin/user/edit/<?php echo $user['id'] ?>">Edit</a></span>
		                            <span class="update-password"> | <a href="<?php echo $baseUrl; ?>admin/user/updatepassword/<?php echo $user['username']; ?>" title="Update Password">Update Password</a></span>
		                            <?php if($user['id'] != $authInfo['id']) { ?>
		                            &nbsp;|&nbsp;<span class="edit"><a onclick="return confirm('Are you sure? No going back now.');" href="<?php echo $baseUrl; ?>admin/user/delete/<?php echo $user['id']; ?>">Delete</a>
		                            <?php } ?>
		                        </div>
		                    </td>
		                    <td class="name column-name"><?php echo $user['first_name'] ?> <?php echo $user['last_name']; ?></td>
		                    <td class="email column-email"><a title="e-mail: <?php echo $user['email']; ?>" href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
		                    <td class="role column-role"><a href="<?php echo $baseUrl; ?>admin/user/list/rolefilter/<?php echo $user['role_id']; ?>" title="Fitler by: <?php echo ucwords($user['role_name']); ?>"><?php echo ucwords($user['role_name']); ?></td>
		                    <td class="posts column-posts num"><?php echo date('F jS, Y', $user['created']); ?></td>
		                </tr>
		            <?php
		            $i++;
		            endforeach;
		            ?>
		        </tbody>
		    </table>
    <!--
    <div class="tablenav">


    <div class="alignleft actions">
        <select name="action2">
            <option selected="selected" value="">Bulk Actions</option>
            <option value="delete">Delete</option>
        </select>
        <input type="submit" class="button-secondary action" id="doaction2" name="doaction2" value="Apply" />
    </div>
-->
		    <script type="text/javascript">
	    	jQuery(document).ready(function($) {
	    		$('#main-nav-user').addClass('current').trigger('click');
	    	});
		    </script>
		</div>
	</div>
</div>
