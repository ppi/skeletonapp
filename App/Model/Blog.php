<?php
namespace App\Model;
class Blog extends Application {
	
	protected $_table = 'ppi_blog';
	protected $_primary = 'id';
	
	function __construct() {
		parent::__construct($this->_table, $this->_primary);
	}
	
	/**
	 * Lets get the pages
	 *
	 * @param string|array $p_mClauses
	 */
	function getPosts($p_mClauses = array(), $p_aOptions = array()) {
		
		$p_mClauses = (array) $p_mClauses;
		$select = $this->select()
			->columns('p.*, u.first_name, u.last_name')
			->from($this->_table . ' p')
			->leftJoin('users u', 'u.id = p.user_id');
			
		if(!empty($p_mClauses)) {
			$select->where(implode(' AND ', $p_mClauses));
		}
		
		if(isset($p_aOptions['order'])) {
			$select->order($p_aOptions['order']);
		} else {
			$select->order('created DESC');
		}
		
		return $select->getList();
		
		
	}
	
	function getAddEditFormStructure($p_sMode = 'create') {
		$structure = array(
	        'fields' => array(
	                'title'      	=> array('type' => 'text', 'label' => 'Title', 'size' => 50, 'id' => 'form_page_title'),
	                'permalink'     => array('type' => 'text', 'label' => 'Permalink', 'size' => 50, 'id' => 'form_page_permalink'),
	                'published'     => array('type' => 'dropdown', 'label' => 'Published', 'options' => array(0 => 'No', 1 => 'Yes')),
	                'content'      	=> array('type' => 'textarea', 'label' => 'Content', 'cols' => '50', 'id' => 'form_page_content'),
					'submit'        => array('type' => 'submit', 'label' => 'Create', 'value' => 'Create', 'id' => 'form_page_submit'),
	         ),
	        'rules' => array(
					'title'      	=> array('type' => 'required', 'message' => 'Title cannot be blank'),
					'permalink'     => array('type' => 'required', 'message' => 'Permalink cannot be blank'),
					'content'      	=> array('type' => 'required', 'message' => 'Content cannot be blank')
	        )
		);
		return $structure;	
	}
	
	function insert(array $p_aRecord) {
		if(!isset($p_aRecord['created'])) {
			$p_aRecord['created'] = time();
		}
		return parent::insert($p_aRecord);
	}

	/**
	 * Grab a posts details from permalink lookup
	 *
	 * @param string $p_sPermalink
	 * @return array
	 */
	function getPostByPermalink($p_sPermalink) {
		return $this->getPosts('permalink = ' . $this->quote($p_sPermalink))->fetch();
	}
	
}