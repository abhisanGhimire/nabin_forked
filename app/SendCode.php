<?php

namespace App;
use Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;

class SendCode 
{
    public static function SendCode($phonenumber){
        return $phonenumber;
        $code = rand(1111,9999);
        $args = http_build_query(array(
            'auth_token'=> '13baf0682b19e049bc2903a36c527aa4f5e3d93084f9080dedd9eb7c91a5c82e',
            'to'    =>'+977'.(int) $phonenumber,
            'text'  => 'verified code is '.$code));
            $url = "https://sms.aakashsms.com/sms/v3/send/";
            
            return $code;

        # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1); ///
    curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    // Response
    $response = curl_exec($ch);
    curl_close($ch);
    }
    
}
