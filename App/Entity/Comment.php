<?php
namespace App\Entity;
/**
 * The Comment class.
 * 
 */
class Comment {

	/**
	 * @var null
	 */
	protected $_title = null;
	/**
	 * @var null
	 */
	protected $_content = null;
	/**
	 * @var null
	 */
	protected $_author_id = null;

	/**
	 * @param array $data
	 */
	function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (method_exists($this, 'set' . $key)) {
				$this->{'set' . $key}($value);
			} elseif (property_exists($this, '_' . $key)) {
				$this->{'_' . $key} = $value;
			}
		}
	}

	/**
	 * @return null
	 */
	function getTitle() {
		return $this->_title;
	}

	/**
	 * @return null
	 */
	function getContent() {
		return $this->_content;
	}

	/**
	 * @return null
	 */
	function getAuthorID() {
		return $this->_author_id;
	}

	/**
	 * @param $author_id
	 */
	public function setAuthorID($author_id) {
		$this->_author_id = $author_id;
	}

	/**
	 * @param $content
	 */
	public function setContent($content) {
		$this->_content = $content;
	}

	/**
	 * @param $title
	 */
	public function setTitle($title) {
		$this->_title = $title;
	}

}