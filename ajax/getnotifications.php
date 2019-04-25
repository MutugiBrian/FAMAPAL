<?php 
include('../includes/functions.php');
$id = $_GET['id'];
$getq = "SELECT COUNT(*)  as nots FROM `notifications` WHERE target_id = $id AND readat = 0";
$getarray = $conn->query($getq);
if ($getarray->num_rows > 0) {while($r = $getarray->fetch_array()){
$nots = $r['nots'];
echo $nots;
}}else{
echo 0;
}
?>