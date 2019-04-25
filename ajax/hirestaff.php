<?php 
include('../includes/functions.php');


$jid = $_GET['jid'];
$jpid = $_GET['jpid'];
$staffemail = $_GET['staffemail'];
$score = $_GET['ss'];
$contractstr = $_GET['contractstr'];
$contractor = $_GET['contractor'];
$uid = $_SESSION['id'];



$reg = "UPDATE `jobs` SET `active` = '1' WHERE `jobs`.`id` = $jid";
$regarray = $conn->query($reg);
if ($regarray === TRUE) {
 $reg2 = "UPDATE `job_proposed` SET `hired` = '1' WHERE `job_proposed`.`id` = $jpid";
$regarray2 = $conn->query($reg2);
if ($regarray2 === TRUE) {

 $si = "SELECT * FROM `users`   WHERE `email` = $staffemail";
    $sia = $conn->query($si);
    if ($sia->num_rows > 1) {
    while($sa = $sia->fetch_array()){
    $sid = $sa['id'];}
    }
    
 $cq = "SELECT * FROM `contracts` WHERE `contstr` = $contractstr";
    $ca = $conn->query($cq);
    if ($ca->num_rows > 1) {
    while($c = $ca->fetch_array()){
    $ctid = $c['contractor_id'];
    $jbid = $c['job_id'];
    
    $notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'hired', '$uid', '$ctid', '$jbid', 'Has hired one of your staff for this job', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify)
    
    }
    }

$notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'hired', '$uid', '$sid', '$jbid', 'Has hired you for this job', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);



echo 1;

}else{

echo 0;
}



}else{
echo 0;
}
?>