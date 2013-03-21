<?php
$config = array();

$config['emailConfig'] = array(
    'firstname' => 'My',
    'lastname'  => 'Application',
    'email'     => 'noreply@myapplication.com'
);

$config['signupEmail'] = array(
    'subject' => 'Activate your new account'
);

$config['forgotEmail'] = array(
    'subject' => 'Request your new password'
);

$config['authSalt'] = 'l3D8fG65m';

return $config;