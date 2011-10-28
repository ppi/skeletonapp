<?php
namespace App\Controller;
use \PPI\Core\CoreException;
class Blog extends Application {
	
	/**
	 * View all blog posts
	 * @return void
	 */
	function index() {
		$oBlog = new \App\Model\Blog();
		$posts = $oBlog->getPosts("published = 1");
		/* Unneeded
		$oTag  = new \App\Helper\TagCloud();
		$oTag->setQuery('SELECT count(*) as `count` FROM ppi_blog_tag GROUP BY `title` ORDER BY `count` DESC');
		$tags  = $oTag->getTagCloud();
		$this->load('blog/index', compact('posts', 'tags'));
		*/
		$this->load('blog/index', compact('posts'));
	}
	
	/**
	 * View an individual blog post
	 * @return void
	 */
	function view() {
		$sPermalink = $this->get(__FUNCTION__, '');
		if($sPermalink == '') {
			throw new CoreException('Invalid Permalink');
		}
		$oBlog = new \App\Model\Blog();
		$post = $oBlog->getPostByPermalink($sPermalink);
		if(empty($post)) {
			throw new CoreException('Unable to obtain post information.');
		}
		$this->load('blog/view', compact('post'));
	}
	
}