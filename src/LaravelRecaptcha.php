<?php

namespace Peresmishnyk\LaravelRecaptcha;

class LaravelRecaptcha
{
    const RECAPTCHA_VERIFY_ENDPOINT_URL = 'https://www.google.com/recaptcha/api/siteverify';
    protected $cookie_name;
    protected $site_key;
    protected $secret_key;

    public function __construct()
    {
        $config = config('laravel-recaptcha');
        // Save config keys
        $this->site_key = $config['site_key'];
        $this->secret_key = $config['secret_key'];
        $this->cookie_name = $config['cookie_name'];
    }

    public function js($action = '')
    {
        return view('laravel-recaptcha::inject',
            [
                'site_key' => $this->site_key,
                'cookie_name' => $this->cookie_name
            ]);
    }

    public function validate_token($token, $ip=null)
    {
        $target_url = self::RECAPTCHA_VERIFY_ENDPOINT_URL;
        $post = [
            'secret' => $this->secret_key,
            'response' => $token,
        ];
        if (!is_null($ip)) {
            $post['remoteip'] = $ip;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $result = curl_exec($ch);

        $curlresponse = json_decode($result, true);

        $score = 0;

        if (isset($curlresponse['success']) && $curlresponse['success'] == true) {
            $score = $curlresponse['score'];
        }
        return $score;
    }


    public function validate()
    {
        $token = $_COOKIE[$this->cookie_name] ?? "";
        $score = $this->validate_token($token);
        return $score;
    }
}
