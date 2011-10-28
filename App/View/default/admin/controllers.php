		<div class="wrap">
		<div class="spacer"></div>
			<div class="pageHeader">
				<h1>Documentation: </h1>
				<span>Controllers</span>
				
				<form action="" method="post" id="search">
					<input type="text" name="searchField" id="searchField" required placeholder="Search..." />
					<button type="submit" id="searchSubmit">Search</button> 
				</form>
			</div>
		</div>
		<div class="spacer"></div>		
			<div class="clear wrap">
				<section class="left_body">
					<article>
						<div class="headmeta">
						
							<form method="" action="">
								<span>Actions: </span> <input type="button" value="Delete Selected"/>							
								<table class="list issues">
									<thead>
									    <tr>
									    	<th><input type="checkbox"/></th>
									    	<th>ID</th>
											<th>Type</th>
											<th>Severity</th>
									        <th>Assigned to</th>
									        <th>Title</th>
									        <th>Created</th>
									        <th>Actions</th>
										</tr>
									</thead>
								
									<tbody>
										<?php if(count($tickets) > 0): ?>
									 		<?php foreach($tickets as $ticket):?>
												<tr class="hascontextmenu odd issue status-1 priority-2" id="issue-3204">
													<td class="checked"><input type="checkbox"/></td>
													<td class="id"><?php echo $ticket['id'];?></td>
											        <td class="type"><?php echo ucfirst($ticket['ticket_type']);?></td>
											        <td class="severity"><?php echo ucfirst($ticket['severity']);?></td>
											        <td class="assigned_to"><?php echo ucwords($ticket['user_assigned_fn'] . ' ' . $ticket['user_assigned_ln']);?> </td>
											        <td class="title"><?php echo ucfirst($ticket['title']);?></td>
											        <!--  <td class="user_name"><?php //echo ucwords($ticket['user_fn'] . ' ' . $ticket['user_ln']);?> </td> -->
											        <td class="created"><?php echo date('d/m/Y', $ticket['created']);?></td>
													<td class="actions">
														<a href="<?php echo $baseUrl;?>admin/ticket_user_addedit">Edit</a> 
														<a href="<?php echo $baseUrl;?>admin/'">View</a> 
														<a href="<?php echo $baseUrl;?>admin/ticket/delete/<?php echo $ticket['id']; ?>">Delete</a>
													</td>
												</tr>
											<?php endforeach;?>
										<?php else:?>
											<tr><td colspan="5">No tickets present</td></tr>
										<?php endif;?>
									</tbody>
								</table>
							</form>
							<style type="text/css">
							.issues th, .issues td { padding-left: 10px; }
							</script>							
																				
									
						</div>

					</article>
				</section>
				<section class="right_sidebar">
										
					<h3>Controllers</h3>

					<ul class="grey">					
						<li style="position: relative;" id="li_docs_chooser">					
							<select id="docs_chooser">
								<optgroup id="empty" label="">							
									<option value="">Introduction</option>
									<option value="controllers">Controllers</option>
									<option value="views">Views</option>
									<option value="models">Models</option>
									<option value="session">Session</option>
									<option value="registry">Registry</option>
									<option value="config">Configuration</option>
								</optgroup>
							</select>
						</li>
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
			</div>			
		<div class="spacer"></div>
		<div class="wrap">
			<section id="newsletter">
				<h5>Join now to our newsletter</h5><span>Stay on top of Releases</span>
				<form action="" method="post">
					<input type="email" name="email" placeholder="Your Email Address" required />
					<button type="submit"><span 
class="button orange">Sign Up</span></button>
				</form>
			</section>
		</div>
		
		<script type="text/javascript">
		jQuery(document).ready(function() {
			$('#docs_chooser').val('controllers');
		});
		</script>		