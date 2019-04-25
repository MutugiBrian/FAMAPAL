<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

//DATABASE CONNNECTION SETTINGS

$server ="localhost";
$user ="root";
$password ="";
$database ="FAMAPAL";

$conn = new mysqli($server,$user,$password,$database);

if($conn->connect_error){
echo"
<script>
alert('DB CONNECTION ERROR');
</script>
";
}  

//END OF DATABASE CONNECTION






//TECHSULT SMS
function sms($to,$sms){


  $url = 'http://techsultsms.co.ke/sms/api';


   /*$url = 'http://techsultsms.co.ke/sms/api?action=send-sms&api_key=QnJpYW46QnJpYW5QQHNz&to='.$to.'&from=Techsult&sms='.$sms;
*/


$data = array(
  'action'      => 'send-sms',
  'api_key'    => 'QnJpYW46QnJpYW5QQHNz',
  'to'       => $to,
  'from' => 'Techsult',
  'sms'      => $sms
);

$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );






$cd  = $result['code'];
$m  = $result['message'];




if($cd == 'ok'){
  ?>
<script type="text/javascript">
  alert("message sent successfully");
</script>


  <?php

}else{
  ?>




  <script type="text/javascript">
  alert("error sending message - <?php var_dump($result); ?>");
</script>




  <?php
}
}
//end of Techsult SMS

        
//GOOGLEMAPS API KEY
//FUNCTION HIRE EMPLOYEE


//FUNCTION HIRE EMPLOYEE ENDS HER


//SHOW RATING STARS GIVEN RATING NUMBER
function showrating($rating){

if($rating == 5 || $rating == 5.0){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>  
<?php
}
elseif($rating == 4.5){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-half-full tt"> </i>  
<?php
}
elseif($rating == 4 || $rating == 4){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 3.5){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-half-full tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
            <?php
}
elseif($rating == 3.0 || $rating == 3){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 2.5 ){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-half-full tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 2 || $rating == 2.0){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 1.5 ){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-half-full tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 1 || $rating == 1.0){
?>
            <i class="fa fa-star tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
elseif($rating == 0.5 || $rating == 0.5){
?>
            <i class="fa fa-star-half-full tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}else{
?>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>
            <i class="fa fa-star-o tt"> </i>  
<?php
}
}
//END OF RATING FUNCTION



    //UPDATING ONLINE     
    if(isset($_SESSION['id'])){
    //UPDATE TO DB AS ONLINE
    $ts = time();
    $uid = $_SESSION['id']; 
    $indreg = "UPDATE `users` SET `lsts` = '$ts' WHERE `users`.`id` = $uid";   
    $indregarray = $conn->query($indreg); 
    if ($indregarray === TRUE) {
    //code to alert the update
    }else{
    //code to alert the error
    } 
    }
    
    
    function getp($from){
           $tn = strtotime($from);
           $nn = time();
           $age = $nn-$tn;
  
  
  if(($age/31557600)>1) {
  $years = $age/31557600;
   $yearsi =  round($years);
    if($yearsi>1) {
     echo "$yearsi Years ago";
    }else{
  echo"One year ago"; 
  }
  
  }
elseif(($age/2678400)>1){
    $months =  $age/2678400;
    $monthsi =  round($months);
      if($monthsi>1) {
     echo "$monthsi Months ago";
    }else{
  echo"1 month ago"; 
  }
  }
elseif(($age/604800)>1){
    $weeks = $age/604800 ;
    $weeksi =  round($weeks);
    if($weeksi>1) {
     echo $weeksi.' Weeks ago';
    }else{
  echo "1 Week ago"; 
  }
  }
elseif(($age/86400)>1){
    $days = $age/86400 ;
    $daysi =  round($days);
       if($daysi>1) {
     echo $daysi.' Days ago';
    }else{
  echo"1 day ago"; 
  }
  }
elseif(($age/3600)>1){
    $hrs = $age/3600 ;
    $hrsi =  round($hrs);
       if($hrsi>1) {
     echo $hrsi.' Hours ago';
    }else{
  echo" 1 hour ago"; 
  }
  }
elseif(($age/60)>1){
    $mins = $age/60;
    $minsi =  round($mins);
       if($minsi>1) {
     echo $minsi.' Minutes ago';
    }else{
  echo'<span style="color:green;font-weight:bold;">1 Minute ago</span>'; 
  }
  }
else{
    echo "<span style='color:green;font-weight:bold;'>Just Now</span>";
  }
  
  
    }
    
    //GET STATUS
    function indicatestatus($ls){
    $nn = time();
    $td = $nn-$ls;
    
    if($td<900){
    echo'
    <div style="position:absolute;top:2px !important;right:2px !important;">
    <div class="online-indicator">
    <span class="blink"></span>
    </div>
    </div>';
    }
    
    }
    
    //SKILLSCORE FUNCTION
    
    function skillscore($uniq,$email){    
    
        //DATABASE CONNNECTION SETTINGS

$server ="localhost";
$user ="root";
$password ="";
$database ="FAMAPAL";

$conn = new mysqli($server,$user,$password,$database);

if($conn->connect_error){
echo"
<script>
alert('DB CONNECTION ERROR');
</script>
";
}  

//END OF DATABASE CONNECTION


    
    $no = "SELECT COUNT(*) AS skillsno FROM job_skills WHERE jobstr = '$uniq'"; 
    $noa = $conn->query($no);
    if ($noa->num_rows > 0) {
    while($r = $noa->fetch_array()){ 
      $sn = $r['skillsno']; 
      
      
      
      $sm = "SELECT COUNT(*) AS matching FROM job_skills js,staff_skills ss WHERE ss.staff_email = '$email' AND js.jobstr = '$uniq' AND ss.skill_id = js.skill_id"; 
    $sma = $conn->query($sm);
    if ($sma->num_rows > 0) {
    while($m = $sma->fetch_array()){ 
      $as = $m['matching']; 
      $sd = $as/$sn;
      $rsd = round($sd,2);
      $ss = $rsd*100;
      return $ss;
      
      
      }}
      
      
      
      
      
      
      
      
      
      
      
      
    
     }}
     }
    //END OF SKILLSCORE FUNCTION  




?>    