<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api{
    MLog,
};

class ApiRequest {

    private $api_url = SKNT_API_URL;
    private $api_version = SKNT_API_VERSION;

    private $auth;

    function __construct($auth) {
        $this->auth = $auth;
    }

    public function Get($path, $version = '') {
        return $this->Request('GET', $path, [], $version);
    }

    public function Post($path, $params = array(), $version = '') {
        return $this->Request('POST', $path, $params, $version);
    }

    public function Put($path, $params = array(), $version = '') {
        return $this->Request('PUT', $path, $params, $version);
    }

    public function Delete($path, $params = array(), $version = '') {
        return $this->Request('DELETE', $path, $params, $version);
    }

    /*
     * returns [
     *      result: "ok|error",
     *      api_version: 0.1,
     *      ...other_data (see doc)
     * ]
     */
    public function Request($method, $path, $params = array(), $version = '') {
        $api_path = $this->api_url . $path;

        if( !$version ) {
            $version = $this->api_version;
        }

        if( $this->auth->isLogin() ) {
            $result = $this->send_request($method, $api_path, $params, $version);
            return $result;
        }
        else {
            $this->auth->LogIn();
        }
    }

    private function send_request($method, $path, $data, $version = '') {
        $headers = $this->GetRequestHeaders($version);

        list($headers, $body) = $this->build_process_request($method, $path, $data, $headers);
        $headers_data = $this->parse_headers($headers);
        list($status, $resultCode) = $this->validate_server_answer($headers_data, $body, $version);

        if( $status == 'ok' ) {
            $response = json_decode($body, true);
            return $response;
        }
        else {
            $response = array(
                'result' => 'error',
                'resultCode' => $resultCode
            );
        }

        if( $response['result'] == 'error' ) {
            // $mlog = new MLog('api_request');
            // $log = array(
            //     $this->auth->GetToken(),
            //     $method,
            //     $path,
            //     json_encode($data),
            //     $body,
            //     json_encode($response)
            // );
            // $mlog->save(implode("\t", $log));
        }

        if( $resultCode == 'API_VERSION_ERROR' || $resultCode == 'JSON_PARSING_ERROR' ) {
            $response['data'] = $body;
        }

        if( $resultCode == 'NOT_AUTHORIZED' ) {
            $this->auth->LogIn();
        }

        return $response;
    }

    private function build_process_request($method, $path, $data, $headers) {
        $opts = array(
            'http' => array(
                'method' => $method,
                'header' => implode("\r\n", $headers),
                'content' => json_encode($data),
                'ignore_errors' => true
            )
        );

        $ctx = stream_context_create($opts);
        $body = file_get_contents($path, false, $ctx);
        $headers = $http_response_header;
        return array($headers, $body);
    }

    private function build_auth_header() {
        if( !$this->auth->api_key_mode ) {
            $header = 'Cookie: ' . SKNT_API_COOKIE_NAME . '=' . $this->auth->GetToken();
        }
        else {
            $header = 'Sknt-Api-Key: ' . $this->auth->GetToken();
        }

        return $header;
    }

    private function validate_server_answer($headers_data, $body, $version) {
        $code = $headers_data['status_code'];
        switch($code) {
            case 200:
                $status = 'ok';
                $message = '';
                break;

            case 401:
                $status = 'error';
                $message = 'NOT_AUTHORIZED';
                break;

            case 404:
                $status = 'error';
                $message = 'NOT_FOUND';
                break;

            case 405:
                $status = 'error';
                $message = 'METHOD_NOT_ALLOWED';
                break;

            case 500:
            default:
                $status = 'error';
                $message = 'INTERNAL_SERVER_ERROR';
                break;
        }

        if( $status == 'ok' ) {
            if( !$body ) {
                $status = 'error';
                $message = 'EMPTY_ANSWER';
            }
            else {
                $response = json_decode($body, true);

                if( json_last_error() !== JSON_ERROR_NONE ) {
                    $status = 'error';
                    $message = 'JSON_PARSING_ERROR';
                }
            }
        }

        return array($status, $message);
    }

    private function parse_headers($headers) {
        $data = array();
        list($proto_ver, $code, $msg) = explode(' ', $headers[0], 3);
        $data['status_code'] = $code;

        foreach($headers as $h_line) {
            if( preg_match('/Content-Type:.*; version=(.*)$/i', $h_line, $m) ) {
                $data['api_version'] = $m[1];
                break;
            }
        }

        return $data;
    }

    public function GetRequestHeaders($version = '') {
        $headers = array();
        $headers[] = 'Accept: ' . SKNT_API_CONTENT_TYPE . '; version=' . $version;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Sknt-Project-Name: ' . PROJECT_NAME;
        $headers[] = $this->build_auth_header();
        return $headers;
    }
}
