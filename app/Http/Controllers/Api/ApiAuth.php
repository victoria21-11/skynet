<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api{
    Module,
};

define('SKNT_API_KEY', '00cb6f130f9e037762e668e86f278fc8');
define('SSO_URL', '');
define('SKNT_API_URL', 'https://php73-bober.sknt.ru/kotelnikov/bill_www_master_8/genisys.sknt.ru/root/sknt');
define('SKNT_API_VERSION', '0.1');
define('SKNT_API_CONTENT_TYPE', 'application/vnd.sknt-genesis+json');
define('PROJECT_NAME', 'www.sknt.ru');
define('SKNT_API_COOKIE_NAME', 'Genesis');

class ApiAuth extends Module {
    protected $_get_vars = array('action', 'token', 'refresh');
    protected $_post_vars = array('action');
    var $_sess_vars = array('user');

    protected $user = array();
    protected $token;
    protected $refresh;

    protected $sso_url = SSO_URL;

    protected $action;
    protected $user_id;

    public $api_key_mode = false;

    function __construct($api_key = '') {
        if(!empty($api_key)) {
            $this->user = array(
                'session' => $api_key,
                'session_expire' => strtotime('+5 year')
            );
            $this->api_key_mode = true;
        }
    }

    function LogIn() {
        if($this->api_key_mode) {
            return;
        }
        $url = $this->sso_url.'?project='.SSO_PROJECT.'&ret='.urlencode(SSO_RET_LOGIN_URL);
        redirect($url);
    }

    function LogOut() {
        global $sess;

        if($this->api_key_mode) {
            return;
        }

        $logout_url = $this->sso_url.'logout?project='.SSO_PROJECT.'&ret='.urlencode(SSO_RET_LOGOUT_URL);

        //drop session
        $sess->drop();

        $this->user = array();
        redirect($logout_url);
    }

    function ReFresh() {
        if($this->api_key_mode) {
            return;
        }
        $url = $this->sso_url.'?project='.SSO_PROJECT.'&ret='.urlencode(SSO_RET_REFRESH_URL);
        redirect($url);
    }

    function RegisterToken() {
        if($this->api_key_mode) {
            return;
        }
        if($this->token) {
            $url = $this->sso_url.'session?project='.SSO_PROJECT.'&token='.$this->token;
            $resp = file_get_contents($url);
            $answer = json_decode($resp, true);
            if($answer['result'] == 'ok') {
                $user['session'] = $answer['token'];
                $user['session_expire'] = $answer['expire'];
                $this->user = $user;
            }
        }

        if(!$this->refresh) {
            redirect(SSO_RET_LOGOUT_URL);
        }
    }

    function isLogin() {
        if(!empty($this->user)) {
            return true;
        }
        return false;
    }

    function GetToken() {
        if($this->isLogin()) {
            return $this->user['session'];
        }
    }

    function isNearExpire() {
        if($this->isLogin()) {
            if(strtotime('+5 min') > $this->user['session_expire']) {
                return true;
            }
        }

        return false;
    }

    function getUserID() {
        return $this->user_id;
    }
}

?>
