<?php
namespace Application\Classes;

class CommunityHelper {

    protected $oauthDriver;

    public function setOAuthDriver($driver)
    {
        $this->oauthDriver = $driver;
    }

    public function getTweetsFromUsername($username)
    {
        $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), array(
            'screen_name' => $username
        ));
        $response = $tmhOAuth->response;
    }

}
