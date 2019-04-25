<?php
include('../includes/common.php');
include('../includes/functions.php');


function sendmessage($to,$message){


  $url = 'http://techsultsms.co.ke/sms/api?';
$action = 'send-sms';
$apikey = 'QnJpYW46QnJpYW5QQHNz';
$from = 'Techsult';
$myvars = 'action=' . $action . '&api_key=' . $apikey . '&to=' . $to . '&from=' . $from . '&sms=' .$message ;
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );







$username   = $_SESSION['atun'];
$apikey     = $_SESSION['atk'];
$recipients = $to;
//Create a new Instance 

}



$jid = $_GET['job'];
$empid = $_GET['employee'];
$uid = $_GET['employer'];
$uname = $_GET['username'];
$qid = $_GET['qid'];

//check if all args exist
if($jid == ''|| $empid == ''|| $uid == ''){
echo 11;
}else{

//activate job

$cq = "SELECT * FROM hired WHERE employeeid = $empid AND completed = 0";
$cqa = $conn->query($cq);
if ($cqa->num_rows > 0) {
echo 11;
}else{
 $hquery = "INSERT INTO `hired` (`id`, `jobid`, `employeeid`, `completed`, `hiredate`, `employerid`) VALUES (NULL, $jid, $empid, '', CURRENT_TIMESTAMP, $uid)";
 $harray = $conn->query($hquery);
if ($harray === TRUE) {
/*$reg = "UPDATE `jobs` SET `active` = '1' WHERE `jobs`.`id` = $jid";
$regarray = $conn->query($reg);
$now = time();
$reg = "UPDATE `jobs` SET `startdate` = $now WHERE `jobs`.`id` = $jid";
$regarray = $conn->query($reg);*/
$reg = "UPDATE `queue` SET `deleted` = '1' WHERE `queue`.`id` = $qid";
$regarray = $conn->query($reg);




$ev = "SELECT u.* ,j.name AS jn FROM users u,jobs j WHERE u.id = $empid and j.id = $jid";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
$no = $dets['p1'];
$nm = $dets['fname'];
$jn = $dets['jn'];
$img = $dets['image'];

$to = "+254".$no;

$sms = 'Hallo '.strtoupper($nm).' , we have good news, you just got hired by '.strtoupper($uname).' at FAMAPAL for a '.strtoupper($jn).' JOB ! open the app and CHECK IN to work.';


sendmessage($to,$sms);


$notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'hired', '$uid', '$empid', '$jid', 'Has hired you for this job', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);


}
echo 1;
}else{

echo 02;
}
//message and notify




}else{
echo 03;
}





}
}



?>