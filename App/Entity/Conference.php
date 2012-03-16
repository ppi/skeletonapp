<?php
namespace App\Entity;
class Conference {

	/**
	 * @var null
	 */
	protected $_title = null;
	
	/**
	 * @var array
	 */
	protected $_comments = array();
	
	/**
	 * @var array
	 */
	protected $_votes = array();
	
	/**
	 * @var array
	 */
	protected $_admin_ids = array();
	
	/**
	 * @var array
	 */
	protected $_talks = array();
	
	/**
	 * The Paper Submissions
	 * 
	 * @var array
	 */
	protected $_submissions = array();


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
	 * @param string $title
	 * @return void
	 */
	function setTitle($title) {
		$this->_title = $title;
	}

	/**
	 * @return bool
	 */
	function hasTalks() {
		return !empty($this->_talks);
	}

	/**
	 * @return bool
	 */
	function hasComments() {
		return !empty($this->_comments);
	}

	/**
	 * @return array
	 */
	function getComments() {
		return $this->_comments;
	}

	/**
	 * @param \App\Entity\Comment $comment
	 * @return void
	 */
	function addComment(\App\Entity\Comment $comment) {
		$this->_comments[] = $comment;
	}

	/**
	 * @return int
	 */
	function getNumComments() {
		return count($this->_comments);
	}
	
	/**
	 * Add a submission
	 * 
	 * @param \App\Entity\Submission $submission
	 * @return void
	 */
	function addSubmission(\App\Entity\Submission $submission) {
		$this->_submissions[] = $submission;
	}
	
	/**
	 * Get the submissions
	 * 
	 * @return array
	 */
	function getSubmissions() {
		return $this->_submissions;
	}
	
	/**
	 * Set cfp_enddate
	 *
	 * @param integer $cfpEnd
	*/
	public function setCfpEnd($cfpEnd) {
		$this->_cfp_enddate = $cfpEnd;
	}
	
	/**
	 * Get cfp_enddate
	 *
	 * @return integer 
	*/
	public function getCfpEnd() {
		return $this->_cfp_enddate;
	}
	
	/**
	* Set cfp_startdate
	*
	* @param integer $cfpStart
	*/
	public function setCfpStart($cfpStart) {
		$this->_cpf_startdate = $cfpStart;
	}
	
	/**
	* Get cfp_startdate
	*
	* @return integer 
	*/
	public function getCfpStart() {
		return $this->_cpf_startdate;
	}

	/**
	 * @return mixed
	 */
	function getAuthorID() {
		return $this->_author_id;
	}

	/**
	 * @return array
	 */
	function getAdminIDs() {
		return $this->_admin_ids;
	}

	/**
	 * @param array $adminIDs
	 * @return void
	 */
	function setAdminIDs($adminIDs) {
		$this->_admin_ids;
	}

	/**
	 * @return int
	 */
	function getNumVotes() {
		return count($this->_votes);
	}

	/**
	 * @return void
	 */
	function openCFP() {
		$this->_cfp_process = true;
	}

	/**
	 * @return void
	 */
	function closeCFP() {
		$this->_cfp_process = false;
	}
}