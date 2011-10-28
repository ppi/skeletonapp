<?php
namespace App\Model;
class User extends \PPI\Model\User  {
	public $_registerFormStructure = array(
        'fields' => array(
                'first_name'            => array('type' => 'text', 'label' => 'First name', 'size' => 30),
                'last_name'             => array('type' => 'text', 'label' => 'Last name', 'size' => 30),
        		'email'                 => array('type' => 'text', 'label' => 'Email address', 'size' => 30),
				'username'                 => array('type' => 'text', 'label' => 'Username', 'size' => 30),
				'password'              => array('type' => 'password', 'label' => 'Enter Password', 'size' => 30),
                'password2'            	=> array('type' => 'password', 'label' => 'Confirm Password', 'size' => 30),
				'submit'                => array('type' => 'submit', 'label' => '', 'value' => 'Register')

		),
        'rules' => array(
				'email'                 => array(
												array('type' => 'required', 'message' => 'Email address is required'),
												array('type' => 'email', 'message' => 'You must enter a valid email address'),
												array('type' => 'minlength', 'message' => 'Your email must consist of at least 5 characters', 'value' => 5),
										   ),
				'username'              => array('type' => 'required', 'message' => 'Please enter your username'),
                'password'              => array('type' => 'required', 'message' => 'Please enter your password'),
                'password2'             => array(
                								array('type' => 'required', 'message' => 'Please confirm your password'),
                								array('type' => 'minlength', 'message' => 'Your password must consist of at least 5 characters', 'value' => 5),
                								array('type' => 'compare', 'message' => 'Your passwords do not match', 'comparee' => 'password')
                							),
                'first_name'            => array('type' => 'required', 'message' => 'First name cannot be blank'),
                'last_name'             => array('type' => 'required', 'message' => 'Last name cannot be blank'),

        )
	);
	public $_loginFormStructure = array(
        'fields' => array(
                'email'      	=> array('type' => 'text', 'label' => 'Email', 'size' => 30),
                'password'      => array('type' => 'password', 'label' => 'Password', 'size' => 30),
				'submit'        => array('type' => 'submit', 'label' => 'Login', 'value' => 'Login'),
         ),
        'rules' => array(
				'email'      	=> array('type' => 'required', 'message' => 'Email cannot be blank'),
                'password'      => array('type' => 'required', 'message' => 'Password cannot be blank')
        )
	);
	protected $_editProfileFormStructure = array();
	protected $_editUserAdminFormStructure = array();
	function __construct() {
		parent::__construct('users', 'id');
	}

	function getLoginFormStructure() {
		return $this->_loginFormStructure;
	}

	/**
	 * Get the languages by the users id
	 *
	 * @param integer $iUserID
	 * @return array
	 */
	function getUserLanguages($iUserID) {
		$oUserLang 	= new UserLanguageModel();
		$oLang 		= new LanguageModel();
		$aUserLanguages = $oUserLang->getList('user_id = '. $this->quote($iUserID));
		foreach($aUserLanguages as $key => $aUserLang) {
			$aLang = $oLang->getList('id = '.$this->quote($aUserLang['lang_id']));
			if(count($aLang) > 0) {
				$aUserLang['name'] = $aLang[0]['name'];
			}
			$aUserLanguages[$key] = $aUserLang;
		}
		return $aUserLanguages;
	}

    function getAdminAddEditFormStructure($p_sMode = 'create') {
    	$structure = array(
            'fields' => array(
                    'first_name'            => array('type' => 'text', 'label' => 'First name', 'size' => 30),
                    'last_name'             => array('type' => 'text', 'label' => 'Last name', 'size' => 30),
            		'email'                 => array('type' => 'text', 'label' => 'Email address', 'size' => 30),
            		'username'              => array('type' => 'text', 'label' => 'Username', 'size' => 30),
                    'role_id'               => array('type' => 'dropdown', 'label' => 'Role', 'options' => array()),
    				'password'              => array('type' => 'password', 'label' => 'Enter Password', 'size' => 30),
                    'password2'            	=> array('type' => 'password', 'label' => 'Confirm Password', 'size' => 30),
    				'submit'                => array('type' => 'submit', 'label' => '', 'value' => 'Register'),

    		),
            'rules' => array(
                    'first_name'            => array('type' => 'required', 'message' => 'First name cannot be blank'),
                    'last_name'             => array('type' => 'required', 'message' => 'Last name cannot be blank'),
                    'username'              => array('type' => 'required', 'message' => 'Username cannot be blank'),
    				'email'                 => array(
    												array('type' => 'required', 'message' => 'Email address is required'),
    												array('type' => 'email', 'message' => 'You must enter a valid email address'),
    												array('type' => 'minlength', 'message' => 'Your email must consist of at least 5 characters', 'value' => 5),
    										   ),
                    'password'              => array('type' => 'required', 'message' => 'Please enter your password'),
                    'password2'             => array(
                    								array('type' => 'required', 'message' => 'Please confirm your password'),
                    								array('type' => 'minlength', 'message' => 'Your password must consist of at least 5 characters', 'value' => 5),
                    								array('type' => 'compare', 'message' => 'Your passwords do not match', 'comparee' => 'password')
                    							)

            )
    	);

        // --------------- ROLES ---------------
        // Get the values in the form of val => label
        $aRoles = getRoles();
        unset($aRoles['guest']);
    	// Remove developer role assignment if the logged in user is not a developer
    	if($this->getSession()->getAuthData(false)->role_name !== 'developer') {
    		unset($aRoles['developer']);
    	}
        $aRoles = array_flip($aRoles);
        // Apply massage function to each role to make it pretty for output in a dropdown
        array_walk($aRoles, array($this, 'massageUserRoles'));
        // Assign values to Role dropdown.
        $structure['fields']['role_id']['options'] = $aRoles;
        // --------------- ROLES ---------------



        // Remove confirm password box for edit mode
        if($p_sMode !== 'create') {
            unset($structure['fields']['password']);
            unset($structure['fields']['password2']);
            unset($structure['rules']['password2']);
            unset($structure['rules']['password']);
            $structure['fields']['submit']['value'] = 'Update';
        }

        return $structure;
    }

    function getAdminUpdatePasswordFormStructure() {
    	$structure = array(
        'fields' => array(
                'password'      	=> array('type' => 'password', 'label' => 'Password'),
                'password_confirm'  => array('type' => 'password', 'label' => 'Confirm Password')
         ),
        'rules' => array(
				'password'      	=> array('type' => 'required', 'message' => 'Password cannot be blank'),
                'password_confirm'  => array('type' => 'required', 'message' => 'Confirm Password cannot be blank')
        )
    	);
    	return $structure;
    }

	function insert(array $p_aRecord) {
		$p_aRecord['active'] = 1;
		return parent::insert($p_aRecord);
	}

    /**
     * UserModel::massageUserRoles()
     * Massage function for user roles -
     * @param mixed &$role Param by reference. The role to modify
     * @return void
     */
    function massageUserRoles(&$role) {
        $role = ucwords(str_replace('_', ' ', $role));
    }

    function putRecord(array $p_aData) {
    	$iUserID = parent::putRecord($p_aData);
    	$bEdit   = isset($p_aData[$this->getPrimaryKey()]);
    	$iInsertUserID = $bEdit ? $p_aData[$this->getPrimaryKey()] : $iUserID;
    		// Add an audit trail
    		$oAudit = new APP_Model_Audit();

    		// Make an insert into the audit log.
//    		$oAudit->insert(array(
////    			''
//    		));
//    	}
    }

}