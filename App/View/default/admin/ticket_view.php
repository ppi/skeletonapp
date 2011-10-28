		<div class="wrap">
			<div class="spacer"></div>
			<div class="pageHeader">
				<h1>Administration: </h1>
				<span><a href="<?php echo $baseUrl; ?>admin/ticket/list">Tickets</a> - <?php echo $ticket['title']; ?></span>
				
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
					<div class="headmeta" style="padding-top: 0;">
						<div style="float: right;">
							<button class="delete_ticket" id="delete_ticket_<?php echo $ticket['id']; ?>" type="submit"><span class="button orange">Delete Ticket</span></button>
						</div>					
						<div style="float: right;">
							<button class="edit_ticket" id="edit_ticket_<?php echo $ticket['id']; ?>" type="submit"><span class="button orange">Edit Ticket</span></button>					
						</div>
						<div style="clear: both;"></div>
						<dl id="ticket_view">
						      <dt>Id: </dt> <dd><?php echo $ticket['id'];?></dd>  
						      <dt>Title: </dt> <dd><?php echo ucfirst($ticket['title']);?></dd> 
						      <dt>Type: </dt> <dd><?php echo ucwords(str_replace('_', ' ', $ticket['ticket_type']));?></dd> 
						      <dt>Severity: </dt> <dd><?php echo ucfirst($ticket['severity']);?></dd> 
						      <dt>Assigned to: </dt> <dd><?php echo ucwords($ticket['user_assigned_fn'] . ' ' . $ticket['user_assigned_ln']);?></dd> 
						      <dt>Created: </dt> <dd><?php echo date('d/m/Y', $ticket['created']);?></dd> 
						      <p><?php echo nl2br($ticket['content']);?></p> 
						                                               
						</dl>					

					</div>

				</article>
			</section>
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
		</div>			
		
		
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#tickets_select_all').bind('click keypress', function() {
				$('#ticket_list_table').find('.ticket_checkbox').each(function(i, item) {
					$(item).attr('checked', $(item).attr('checked') ? false : true);
				});
				return false;
		});

		$('.edit_ticket').bind('click keypress', function() {
			window.location.href = baseUrl + 'admin/ticket/edit/' + $(this).attr('id').replace('edit_ticket_', '');
			return false;			
		});

		$('.delete_ticket').bind('click keypress', function() {
			if(confirm('Are you sure?')) {
				window.location.href = baseUrl + 'admin/ticket/delete/' + $(this).attr('id').replace('delete_ticket_', '');
				return false;			
			}
		});
		
				
			
	});
</script>

<style>
#ticket_view dt {
	-moz-border-radius:4px 4px 4px 4px;
	-webkit-border-radius:4px 4px 4px 4px;
	background-color:#2B2F29;
	color:#AFAFAF;
	float:left;
	line-height:27px;
	margin-left:21px;
	margin-top:12px;
	padding-left:5px;
	padding-right:10px;
	width:145px;
}
#ticket_view dd {
	-moz-border-radius:4px 4px 4px 4px;
	background-color:#2B2F29;
	margin-left:9px;
	margin-right:10px;
	margin-top:10px;
}
	
dl#ticket_view {
	background:none repeat scroll 0 0 #8693A4;
	border-bottom:1px solid #F1F1F1;
	line-height:32px;
	margin:1px 0 0;
	padding-bottom:10px;
	padding-left:1px;
	padding-top:10px;
}		
#ticket_view p {
	color:#3B3D3F;
	padding-left:10px;
	padding-top:15px;
}





					
</style>


<style type="text/css">
	.issues th, .issues td { }
	#ticket_list_table { margin-top: 20px; }
	#no_tickets {
		padding-top: 20px;
	}
</style>