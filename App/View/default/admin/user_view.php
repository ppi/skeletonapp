
<div class="content-box">
	<div class="content-box-header"><h3 style="cursor: s-resize; "><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></h3></div>
	<div class="content-box-content" style="display: block; ">
		<div class="tab-content default-tab" style="display: block; ">

		    <table cellspacing="0" class="widefat fixed" id="admin_users_menu">
		        <tbody>
		            <tr class="alternate" id="user-1">
		                <td width="10%">Email</td><td><?php echo $user['email']; ?></td>
		            </tr>
		            <tr class="alternate" id="user-1">    
		                <td width="10%">Active</td><td><?php echo $user['active'] == 1 ? 'Yes' : 'No'; ?></td>
		            </tr>
		            <tr class="alternate" id="user-1">
		                <td width="10%">Role</td><td><?php echo ucfirst($user['role_name']); ?></td>
		            </tr>
		        </tbody>
		    </table>
    
		</div>
	</div>
</div>