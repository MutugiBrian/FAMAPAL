<?php 
	include('../includes/functions.php');
	$cid = $_GET['cid'];
  $cv = "SELECT * FROM users WHERE type = 3 AND cid = '$cid' ";
    $cvarray = $conn->query($cv);
    if ($cvarray->num_rows > 0) {
    echo "1";
    }else{
    echo "0";
    }
	

?>