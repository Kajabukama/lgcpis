<?php

	require '../classes/twilio-php-master/Twilio/autoload.php';
    // Use the REST API Client to make requests to the Twilio REST API
    use Twilio\Rest\Client;

    $sid = 'AC704e2243741d245cc450f5dcd929516b';
    $token = '80199f9ff67abea8ab670500a913e236';

    $client = new Client($sid, $token);
    $from = '+447481339364';
    
?>