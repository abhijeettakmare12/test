<?php

class MailChimp_API {

    public $key;
    public $datacenter;

    public function __construct($api_key) {
        $api_key = trim($api_key);
        if(!$api_key) {
            throw new Exception(__('Invalid API Key: ' . $api_key));
        }

        $this->key        = $api_key;
        $dc               = explode('-', $api_key);
        $this->datacenter = empty($dc[1]) ? 'us1' : $dc[1];
        $this->api_url    = 'https://' . $this->datacenter . '.api.mailchimp.com/3.0/';
        return;
    }

    public function get($endpoint, $count=10) {
        $url = $this->api_url . $endpoint;

        if($count) {
            $url .= '?count=' . $count;
        }

        $args = array(
            'timeout'     => 5,
            'redirection' => 5,
            'httpversion' => '1.1',
            'user-agent'  => 'MailChimp WordPress Plugin/' . get_bloginfo( 'url' ),
            'headers'     => array("Authorization" => 'apikey ' . $this->key)
        );

        $request = wp_remote_get($url, $args);

        if(is_array($request) && $request['response']['code'] == 200) {
            return json_decode($request['body'], true);
        } elseif(is_array($request) && $request['response']['code']) {
            $error = json_decode($request['body'], true);
            $error = new WP_Error('mailchimp-get-error', $error['detail']);
            return $error;
        } else {
            return false;
        }
    }

    public function post($endpoint, $body, $method='POST') {
        $url = $this->api_url . $endpoint;
        
        $args = array(
            'method' => $method,
            'timeout' => 5,
            'redirection' => 5,
            'httpversion' => '1.1',
            'user-agent'  => 'MailChimp WordPress Plugin/' . get_bloginfo( 'url' ),
            'headers'     => array("Authorization" => 'apikey ' . $this->key),
            'body' => json_encode($body)
        );
        $request = wp_remote_post($url, $args);

        if(is_array($request) && $request['response']['code'] == 200) {
            return json_decode($request['body'], true);
        } else {
            if(is_wp_error($request)) {
                return new WP_Error('mc-subscribe-error', $request->get_error_message());
            }

            $body = json_decode($request['body'], true);
            return new WP_Error('mc-subscribe-error-api', $body['detail']);
        }
    }
}