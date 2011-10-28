<div class="content-box">
	<div class="content-box-header"><h3 style="cursor: s-resize; ">User Role Management</h3></div>
	<div class="content-box-content" style="display: block; ">
		<div class="tab-content default-tab" style="display: block; ">
		<?php if($bReadOnly === false) { ?>
			<p><a class="button" href="<?php echo $baseUrl; ?>admin/user/create">Create new role</a></p>
		<?php } ?>
		    <table cellspacing="0" class="widefat fixed" id="admin_users_menu">
		        <thead>
			        <tr class="thead">
			        	<th style="" class="manage-column column-id" id="username" scope="col">ID</th>
			        	<th style="" class="manage-column column-name" id="name" scope="col">Name</th>
			        	<th style="" class="manage-column column-number-of-users" id="email" scope="col">Numer of users</th>
			        	<?php if($bReadOnly === true) { ?>
			        	<th style="" class="manage-column column-number-of-users" id="email" scope="col">Actions</th>
			        	<?php } ?>
			        </tr>
		        </thead>
		        <tbody class="user-list" id="users">
		            <?php
		            $i = 0;
		            foreach($aRoles as $sRole => $iRoleID):
		            	$iRoleCount = isset($aRoleCounts[$iRoleID]) ? $aRoleCounts[$iRoleID] : 0;
		            ?>
		            	<tr class="" id="user-1">
		                    <td class="username column-username">
		                        <strong><?php echo $iRoleID; ?></strong><br />
		                    </td>
		                    <td class="name column-name"><?php echo $sRole; ?></td>
		                    <td class="email column-email"><a title="Show users assigned to this role" href="<?php echo $baseUrl; ?>admin/user/list/rolefilter/<?php echo $iRoleID; ?>"><?php echo $iRoleCount; ?></a></td>
		                    <?php if($bReadOnly === true): ?>
		                    <td class="name column-name">
		                    	<a href="<?php echo $baseUrl; ?>"><img src="<?php echo $baseUrl; ?>images/pencil.png" alt="Edit Role" /></a>
		                    	<?php if($iRoleCount == 0) { ?>
		                    	<a href="<?php echo $baseUrl; ?>admin/user/roles/delete/<?php echo $iRoleID; ?>" title="Delete Role" onclick="return confirm('Are you sure? No going back now.');"><img src="<?php echo $baseUrl; ?>images/cross.png" alt="Delete Role" /></a>
		                    	<?php } ?>
		                    </td>
		                    <?php endif; ?>
						</tr>
		            <?php
		            $i++;
		            endforeach;
		            ?>
		        </tbody>
		    </table>
		
		    <script type="text/javascript">
	    	jQuery(document).ready(function() {
	    		$('#main-nav-user').addClass('current').trigger('click');
	    	});
		    </script>
			
		</div>
	</div>
</div>
    