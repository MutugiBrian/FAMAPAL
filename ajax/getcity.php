<?php
	include('../includes/functions.php');
	if($_GET['countryid']==0){
			echo "<option value='0'>- - Select Country - -</option>";
		}
	else {
   $countries = "SELECT * FROM cities WHERE country_id = ".$_GET['countryid']."";
    $carray = $conn->query($countries);
   
    echo '<option value="" disabled selected>Choose your City</option>';
    if ($carray->num_rows > 0) {while($row = $carray->fetch_array()){
    $cid = $row['id'];  
    $name = $row['name']; 
      
    echo'<option value="'.$cid.'">'.$name.'</option>';
 
    }}else{
    
    echo "no cities set";
    }  }
?>      