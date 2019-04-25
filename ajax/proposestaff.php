<?php 
include('../includes/functions.php');

$jid = $_GET['jid'];
$staffid = $_GET['staffid'];
$score = $_GET['ss'];
$contract = $_GET['contract'];
$contractor = $_GET['contractor'];
$by = $_GET['jpb'];



$reg = "INSERT INTO `job_proposed` (`id`, `job_id`, `staff_id`, `contractor_id`, `contractstr`, `skillscore`, `hired`, `completed`, `hiredate`, `date_proposed`) VALUES (NULL, $jid,  $staffid, $contractor, '$contract', $score, 0, 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$regarray = $conn->query($reg);

$notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'proposed', '$contractor', '$staffid', '$jid', 'Has proposed you for this job,stay alert', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);

$notify2 = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'proposed', '$contractor', '$by', '$jid', 'Has proposed staff for this job,kindly respond', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray2 = $conn->query($notify2);


echo 1;
?>