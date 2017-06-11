<?php
    
    function openDB(){
        $link = mysqli_connect('localhost','root','','lgcpis_db');
        if (!$link) {
            die('There was an error : '.mysqli_error($link));
        }
        return $link;
    }
    function closeDB($link){
        if (isset($link)) {
            unset($link);
        }
    }
    function clean($input){
       $string = htmlentities($input,ENT_NOQUOTES,'UTF-8');
       $string = str_replace('&euro;',chr(128),$string);
       $string = html_entity_decode($string,ENT_NOQUOTES,'ISO-8859-15');
       return $string;
    }
    function randomToken($length) {
        $token = '';
        for($i = 0; $i < $length; $i++) {
            $token .= mt_rand(0, 9);
        }
        return $token;
    }
    function encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'rots_*1-9';
        $secret_iv = '2016-rots*&';

        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    function timeAgo($timeNew,$timeOld) {
    
        $difference = $timeNew - $timeOld;
                
        if ($difference > DAYS) {
            $difference = round($difference/DAYS) . " days ago";
        }
        else if ($difference > HOURS) {
            $difference = round($difference/HOURS) . " hours ago";
        }
        else if ($difference > MINUTES) {
            $difference = round($difference/MINUTES) . " minutes ago";
        }
        else if ($difference > SECONDS) {
            $difference .= " seconds ago";
        }
        return $difference;
    }

    function logAction($action, $message=""){

        $logfile = SITE_ROOT.DS."logs".DS."logfile.txt";
        $new = file_exists($logfile) ? false : true ;

        if ($handle = fopen($logfile, 'a')) {
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
            $content = "{$timestamp} | {$action} : {$message} \n";
            fwrite($handle, $content);
            fclose($handle);        
        }
    }

    function convertDate($date){
        $formatted = date('Y-m-d',strtotime(str_replace('/', '-', $date)));
        return $formatted;
    }
    
    
    function prepare($number){
        $count = 1;
        if (isset($number)) {
            return substr_replace($number,'+255',0,-9);
        }
    }

    // Function to get the client IP address
    function getip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function generateString($length = 0) {
        $characters = '#@_-+?*%!0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    function escape($string = null, $link = null){
        return mysqli_real_escape_string($link,$string);
    }
   
  


