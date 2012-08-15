<?php

namespace UserModule\Classes;

use UserModule\Entity\User as UserEntity;

class Email {
    
    public function __construct() {
        
    }

    /**
     * Send the activation email
     * 
     * @param \UserModule\Entity\User $from
     * @param \UserModule\Entity\User $to
     * @param string            $subject
     * @param string            $emailContent
     * @return mixed
     */
    public function sendEmail(UserEntity $from, UserEntity $to, $subject, $emailContent) {

        $transport = \Swift_MailTransport::newInstance();
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance($subject)
          ->setFrom(array($from->getEmail() => $from->getFullName()))
          ->setTo(array($to->getEmail() => $to->getFullName()))
          ->setBody($emailContent, 'text/html');

        return $mailer->send($message);
        
    }
    
}