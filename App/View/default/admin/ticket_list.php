		<div class="wrap">
			<div class="spacer"></div>
			<div class="pageHeader">
				<h1>Administration: </h1>
				<span>Tickets</span>
				
				<form action="" method="post" id="search">
					<input type="text" name="searchField" id="searchField" required placeholder="Search..." />
					<button type="submit" id="searchSubmit">Search</button> 
				</form>
			</div>
		</div>
		<div class="spacer"></div>		
		<div class="clear wrap">
			<section class="left_body" style="width: 100%">
				<article>
					<div class="headmeta">

						<div style="float: left"><button id="create_ticket" type="submit"><span class="button orange">Create Ticket</span></button></div>
						<div style="float: right">
							<form id="search_tickets_form" action="" method="post">
								<div class="search"> 
									<div class="search_field_container"><input type="text" placeholder="Search..." required="" class="search_field" id="search_tickets_field" name="keyword"></div>
									<div class="search_submit_container"><button class="search_button" id="search_tickets_submit" type="submit">Search</button></div>				
								</div>
							</form>
						</div>							
						<div style="clear: both;"></div>	

						<div style="float: left">
							<button id="tickets_select_all" type="submit"><span class="button orange">Select All</span></button>
						</div>
						<div style="float: right">
							<button type="submit" id="ticket_delete_selected"><span class="button orange">Delete Selected</span></button>
						</div>
						<div style="clear: both;"></div>
							
						<form method="post" action="">							
														
							<table class="list issues" id="ticket_list_table" width="100%">
								<thead>
								    <tr>
								    	<th><!-- <input type="checkbox"/> --></th>
								    	<th>ID</th>
								        <th>Title</th>								    	
										<th>Type</th>
										<th>Severity</th>
								        <th>Assigned to</th>
								        <th>Created</th>
								        <th>Actions</th>
									</tr>
								</thead>
							
								<tbody>
									<?php if(count($tickets) > 0): ?>
								 		<?php foreach($tickets as $ticket):?>
											<tr class="hascontextmenu odd issue status-1 priority-2" id="issue-3204">
												<td class="checked"><input class="ticket_checkbox" id="ticket_checkbox_<?php echo $ticket['id']; ?>" type="checkbox"/></td>
												<td class="id"><?php echo $ticket['id'];?></td>
										        <td class="title"><?php echo ucfirst($ticket['title']);?></td>
										        <td class="type"><?php echo ucwords(str_replace('_', ' ', $ticket['ticket_type']));?></td>
										        <td class="severity"><?php echo ucfirst($ticket['severity']);?></td>
										        <td class="assigned_to"><?php echo ucwords($ticket['user_assigned_fn'] . ' ' . $ticket['user_assigned_ln']);?> </td>
										        <!--  <td class="user_name"><?php //echo ucwords($ticket['user_fn'] . ' ' . $ticket['user_ln']);?> </td> -->
										        <td class="created"><?php echo date('d/m/Y', $ticket['created']);?></td>
												<td class="actions">
													<a href="<?php echo $baseUrl . 'admin/ticket/edit/ ' . $ticket['id']; ?>">Edit</a> 
													<a href="<?php echo $baseUrl;?>admin/ticket/view/<?php echo $ticket['id']; ?>">View</a> 
													<a onclick="return confirm('Are you sure?');" href="<?php echo $baseUrl;?>admin/ticket/delete/<?php echo $ticket['id']; ?>">Delete</a>
												</td>
											</tr>
										<?php endforeach;?>
									<?php else:?>
										<tr><td colspan="8" id="no_tickets">No tickets present</td></tr>
									<?php endif;?>
								</tbody>
							</table>
						</form>		
					</div>

				</article>
			</section>
			<!-- 
			<section class="right_sidebar">
									
				<h3>Controllers</h3>

				<ul class="grey">					
					<li><a href="#">Controller dispatchment</a></li>
					<li><a href="#">Application Controller</a></li>
					<li><a href="#">Creating a controller </a></li>
					<li><a href="#">Controller Helper Methods</a></li>
				</ul>
				<div class="tabs">
					<ul class="head">
						<li class="current"><a href="#">Recent Comments</a></li>
						<li><a href="#">Popular Posts</a></li>
					</ul>
					<ul class="content">
						<li class="current">
							<p><strong>Drag says:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							<p><a href="#">2 days ago</a> in <a href="#">Security Concepts</a></p>
								<div class="sidediv"></div>
							<p><strong>Drag says:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							<p><a href="#">2 days ago</a> in <a href="#">Security Concepts</a></p>
								<div class="sidediv"></div>
							<p><strong>Drag says:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							<p><a href="#">2 days ago</a> in <a href="#">Security Concepts</a></p>
								<div class="sidediv"></div>
							<p><strong>Drag says:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							<p><a href="#">2 days ago</a> in <a href="#">Security Concepts</a></p>
						</li>
						<li>
							<p>Secondary Content</p>
						</li>
					</ul>
				</div>
			</section>
			 -->
		</div>			
		
		
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#tickets_select_all').bind('click keypress', function() {
				$('#ticket_list_table').find('.ticket_checkbox').each(function(i, item) {
					$(item).attr('checked', $(item).attr('checked') ? false : true);
				});
				return false;
		});

		$('#create_ticket').bind('click keypress', function() {
			window.location.href = baseUrl + 'admin/ticket/create';
			return false;			
		});
		
		$('#search_tickets_field').keyup(function(e) {
			if(e.keyCode == 13) {
				$('#search_tickets_form').submit();
			}
		});	

		$('#search_tickets_submit').bind('click keypress', function() {
			$('#search_tickets_form').submit();
		});

		$('#ticket_delete_selected').bind('click keypress', function() {
			checkedTicketIDs = [];			
			$('#ticket_list_table').find('.ticket_checkbox').each(function(i, item) {
				if($(item).is(':checked')) {
					checkedTicketIDs.push($(item).attr('id').replace('ticket_checkbox_', ''));
				}
			});
			if(checkedTicketIDs.length > 0) {
				window.location.href = baseUrl + 'admin/ticket/delete/' + checkedTicketIDs.join(',');
			}
			return false;		
		});		
			
	});
</script>


<style type="text/css">
	.issues th, .issues td { }
	#ticket_list_table { margin-top: 20px; }
	#no_tickets {
		padding-top: 20px;
	}
</style>