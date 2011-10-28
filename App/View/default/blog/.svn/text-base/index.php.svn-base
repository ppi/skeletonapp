<div id="content">
	<?php foreach($posts as $post): ?>
	<div class="post">
		<h1 class="title"><?php echo $post['title']; ?></h1>
		<p class="meta">
			Posted by <?php echo $post['first_name'] . ' ' . $post['last_name']; ?> on <?php echo date('F jS, Y', $post['created']); ?>
			&nbsp;&bull;&nbsp;<!-- <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; -->
			<a href="<?php echo $baseUrl; ?>blog/view/<?php echo $post['permalink']; ?>" class="permalink">Full article</a>		
		</p>
		<div class="entry">
			<ul>
				<li>Learning delivered via the internet to any receptive device, be it personal computer, digital television or mobile phone.</li>
				<li>Learning which complies with industry standards to ensure accessibility and interoperability with other standards-compliant systems.</li>
				<li>Learning thats engaging and specific to your business requirements.</li>
			</ul>
		</div>
	</div>
	<?php endforeach; ?>
</div>