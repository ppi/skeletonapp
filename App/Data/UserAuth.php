<?php
namespace App\Auth;
class UserAuth {

	/**
	 * The model doing the SQL lookups
	 *
	 * @var null
	 */
	protected $_model = null;

	/**
	 * The username field to check upon
	 *
	 * @var string
	 */
	protected $_usernameField = 'email';

	/**
	 * The hash algorithm for encryption
	 *
	 * @var string
	 */
	protected $_algo = 'sha1';

	/**
	 * The salt for password generation
	 *
	 * @var string
	 */
	protected $_salt = '';

	function __construct(array $options = array()) {

		// Model
		if(isset($options['model'])) {
			$this->_model = is_string($options['model']) ? new $options['model'] : $options['model'];
		}
		// Algo
		if(isset($options['algo'])) {
			$this->_algo = $options['algo'];
		}

		// Username Field
		if(isset($options['usernameField'])) {
			$this->_usernameField = $options['usernameField'];
		}

		// Salt
		if(isset($options['salt'])) {
			$this->_salt = $options['salt'];
		}

	}

	/**
	 * Verify a users credentials
	 *
	 * @param string $username
	 * @param string $password
	 * @return bool
	 */
	function verify($username, $password) {

		$user = $this->_model->getUserByUsername($this->_usernameField, $username);
		if(!empty($user)) {
			return $this->encrypt($this->_salt, $password) === $user['password'];
		}
		return false;
	}

	/**
	 * Encrypt a password
	 *
	 * @param string $salt
	 * @param string $password
	 * @return string
	 */
	function encrypt($salt, $password) {
		return hash($this->_algo, $salt . $password);
	}

	/**
	 * Set the auth algo
	 *
	 * @param string $algo
	 * @return void
	 */
	function setAlgo($algo) {
		$this->_algo = $algo;
	}

	/**
	 * Secure a param
	 *
	 * @param mixed $var
	 * @return string
	 */
	function secure($var) {
		return $this->_model->quote($var);
	}


}