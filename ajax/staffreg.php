<?php 

include '../includes/functions.php';
$cid = $_GET['cid'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$p1 = $_GET['p1'];
$p2 =  $_GET ['p2'];
$add = $_GET['add'];
$zip = $_GET['zip'];
$country = $_GET['country'];
$city = $_GET['city'];
$industry = $_GET['industry'];
$skills = $_GET['skills'];
$image = $_GET['image'];
$resume = $_GET['resume'];
$password = $_GET['password'];

$staffreg = "INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `email`,`country`,`city`, `cid`, `p1`, `p2`, `skills`, `image`, `resume`, `datejoined`, `password`) 
VALUES (NULL, '2', '$fname', '$lname', '$email', '$country', '$city', '$cid', '$p1', '$p2', '$skills', '$image', '$resume', CURRENT_TIMESTAMP, '$password')";
$regarray = $conn->query($staffreg);
if ($regarray === TRUE) {
echo "success";
} else {
    echo "error";
}



?>