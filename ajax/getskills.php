<?php
	$server ="localhost";
$user ="root";
$password ="";
$database ="FAMAPAL";

$conn = new mysqli($server,$user,$password,$database);
	if($_GET['industryid']==0){
			echo "<option value=''>- - Select Industry First - -</option>";
		}
	else {
   $countries = "SELECT * FROM skills WHERE industry_id = ".$_GET['industryid']."";
    $carray = $conn->query($countries);
   
    echo '<option value="" disabled selected>Choose Skills</option>'; 
    if ($carray->num_rows > 0) {while($row = $carray->fetch_array()){
    $cid = $row['id'];  
    $name = $row['name']; 
      
    echo'<option value="'.$cid.'">'.$name.'</option>';
 
    }}else{
    
    echo '<option value="0" selected>not specified</option>'; 
    }  }
?>      