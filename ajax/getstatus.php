<?php 
include('../includes/functions.php');




if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //ajax detected
}else{ 
//GETTING LOCATION THROUGH IP ADDRESS FUNCTION
function getloc(){
    //START OF GET IP
    
    function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

/*$ip = file_get_contents('https://api.ipify.org');*/


    function getUserIPrr()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$ipaddress = getUserIPrr();



    
    //END OF GET IP
    $auth2 = "2b0f8a3e-0bdf-4a9b-a29d-aae752a2dcf5";
    $auth3 = "83a4ac34-126a-47bb-b06c-9c75f61eb740";
    $auth1 = "d0eb8410-c403-483e-a7fb-750f787a1136";
        
    $result = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth3.''));
    $result =  (array)$result;
    if(isset($result['country'])){
    $_SESSION['ip'] = $ipaddress;
    return $result;
    }else{
    
    $result = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth2.''));
    $result =  (array)$result;
    if(isset($result['country'])){
    $_SESSION['ip'] = $ipaddress;
    return $result;
    }else{
    
    
    $result = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth1.''));
    $result =  (array)$result;
    if(isset($result['country'])){
    $_SESSION['ip'] = $ipaddress;
    return $result;
    }
    
    
    }
    
    
    }



}

//END OF GET LOCATION THROUGH IP ADDRESS     

//SET LOCATION VARIABLES 
 
if (!isset($_SESSION['country'])) {
       $loc = getloc();
       $_SESSION['loc'] = $loc;
       if(isset($loc['ip'])){
       $ip = $loc['ip']; 
       }
         
       
       $city = $loc['city'];
       $_SESSION['city'] = $city;
       $country = $loc['country'];
       $_SESSION['country'] = $country;
       $lat = $loc['latitude'];
       $_SESSION['latitude'] = $lat; 
       $long = $loc['longitude'];
        $_SESSION['longitude'] = $long; 
       $currency = $loc['currency']; 
       $_SESSION['currency'] = $currency; 
       
       
       $cookie_name = "city";
      $cookie_value = "John Doe";
      if(isset($_SESSION['id'])){
      setcookie("city", $city, time() + (86400 * 30)); // 86400 = 1 day 
      setcookie("lat", $lat, time() + (86400 * 30));
      setcookie("long", $long, time() + (86400 * 30));
      setcookie("ip", $ip, time() + (86400 * 30));
    }
      
         }else{
        $zipc = "";
        $ip = $_SESSION["ip"];
        $city = $_SESSION["city"];
        $country = $_SESSION["country"];
        $lat = $_SESSION["latitude"];
        $long =  $_SESSION["longitude"]; 
       }
       
       
       
       //end brace 
       } 
$id = $_GET['id'];
$nn = time();

$ug = "SELECT * FROM users WHERE `id` = $id";
$uarray = $conn->query($ug);
    if ($uarray->num_rows > 0) {while($u = $uarray->fetch_array()){
    $iid = $u['id'];    
    $ls = $u['lsts']; 
    $pj = $u['lspj']; 
    
    
    $td = $nn-$ls;
    $pd = $nn-$pj; 
    if($td<900){
    if($pd<900){
    echo'
    <div class=" text-success font-weight-bold">
    posting..
    <div class="online-indicator">
    <span class="blink"></span>
    </div>&nbsp;
    </div> 
    ';
    }else{
    echo'
    <div class="online-indicator">
    <span class="blink"></span>
    </div>'; 
    }
    }else{
    //WHAT TO DISPLAY IF OFFLINE
    //echo "offline";
    }
  
  
  
  
  
  
    }}

    
?>