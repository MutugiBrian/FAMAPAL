<?php
require_once ('AfricasTalkingGateway.php');

// Set your app credentials
$username   = "sandbox";
$apikey     = "4b72527193aa1153e6e14c076c72cf99780160e934813be4decbafe8bd7be67e";


// Set the numbers you want to send to in international format
$recipients = "+254714359693";

// Set your message
$message    = "Hallo from  brian";

//Create a new Instance 
$gateway  = new AfricasTalkingGateway($username, $apikey);

try
{
    $results = $gateway->sendMessage($recipients, $message);

    foreach ($results as $result){

    echo "Number:" .$result->number ;
    echo "Status:" .$result->status ;
    echo "Messageid:" .$result->messageId ;
    echo "Cost:" .$result->cost."\n";

  }
}

catch (AfricasTalkingGatewayException $e)
{
    echo "Error Sending the message: ".$e->getMessage();
}
