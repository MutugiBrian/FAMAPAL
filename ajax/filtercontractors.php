    <?php
    include('../includes/functions.php'); 
    $filter = $_GET['f'];
    $industry = $_GET['i'];
    
    if($filter == "ratings"){
    $industries = "SELECT * FROM users WHERE type = 3 ORDER BY rating DESC ";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['cname']; 
    $rating  = $row['rating']; 
    $image  = $row['image'];
$name = substr($iname,0,20).'';
    echo '
       <option value="'.$iid.'"  data-icon="'.$image.'" class="rounded-circle">'.$name.'</option>
    ';
    }}else{
    
    echo "no contractors";
    } 
    }elseif($filter == "industry"){
    
    echo $industry; 
    $industries = "SELECT * FROM users WHERE type = 3 AND industry = $industry";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 1) {while($row = $iarray->fetch_array()){
   $iid = $row['id'];    
    $iname = $row['cname']; 
    $rating  = $row['rating']; 
    $image  = $row['image'];
$name = substr($iname,0,20).'';
    echo '
       <option value="'.$iid.'"  data-icon="'.$image.'" class="rounded-circle">'.$name.'</option>
    ';
    }}else{
    
    echo "no contractors";
    } 
    
    
    
    
    
    }else{
    
    $industries = "SELECT * FROM users WHERE type = 3";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['cname']; 
    ?> 
       <option value="<?php echo $iid;?>"><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no contractors";
    } 
    
    
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
     
    ?>