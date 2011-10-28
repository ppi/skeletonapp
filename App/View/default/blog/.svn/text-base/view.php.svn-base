<div id="content">
	<div class="post">
		<h1 class="title"><?php echo $post['title']; ?></h1>
		<p class="meta">
			Posted by <a href="#">Someone</a> on <?php echo date('F jS, Y', $post['created']); ?>
			&nbsp;&bull;&nbsp;<!-- <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; -->
			<a href="<?php echo $baseUrl; ?>blog/view/<?php echo $post['permalink']; ?>" class="permalink">Full article</a>		
		</p>
		<div class="entry">
			<?php echo str_replace('###BASEURL###', $baseUrl, $post['content']); ?>
		</div>
	</div>
</div>