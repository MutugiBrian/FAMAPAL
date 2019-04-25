<style type="text/css">
  .fas{
    color: <?php echo $tt; ?> !important;
  }
</style>


<?php

   
        


$imageerr='click paperclip to upload employer logo';  
$reg=0;
$nr = 0;
$nm = "HALLO";
$tc = "text-danger";
if(isset($_POST['fsub'])){

$email = $_POST['email'];
$ev = "SELECT * FROM users WHERE email = '$email' ";
    $evarray = $conn->query($ev);
    if ($evarray->num_rows > 0) {
    $et = 1;
    }else{




 
    $target_dir = "uploads/profileimages/";
    $now = time();
$target_file = $target_dir.$now.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
         $imageerr =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
         $imageerr =  "File is not an image.";
        $uploadOk = 0;

    }
}



// Check if file already exists
if (file_exists($target_file)) {
     $imageerr =  "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
     $imageerr =  "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     $imageerr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $imageerr =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $imageerr =  "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        $uploadOk = 1;
}else {
         $imageerr =  "Sorry, there was an error uploading your file.";
          $uploadOk = 0;
    }
}





if($uploadOk == 1){

    //IMAGE UPLOAD CODE ENDS HERE

        $imageerr = "Image uploaded successfully!"; 




    $et = 0;
        //REGISTER STAFF 
        
        /*include '../includes/functions.php';*/
$bno = $_POST['Bno'];
$bname = $_POST['Bname'];
$nm = $bname;
$btype = $_POST['btypeselect'];
$email = $_POST['email'];
$p1 = $_POST['p1'];
$p2 =  $_POST ['p2'];
$add = $_POST['add'];
$zip = $_POST['zip'];
$industryn = $_POST['industryselect'];
$image = $target_file;
$password = $_POST['password'];
$password = md5($password);


    //GET INDUSTRY ID IF EXISTS , INSERT NEW IF IT DOES NOT
   $industries = "SELECT * FROM industries WHERE name = '$industryn' ";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $industry = $iid;     
    }}else{ 
    //INSERT NEW INDUSTRY
    $indreg = "INSERT INTO `industries` (`name`, `description`, `jobs`, `id`) VALUES ('$industryn', '', '0', NULL)";   
    $indregarray = $conn->query($indreg); 
    if ($indregarray === TRUE) {
    $industry = $conn->insert_id;
    }else{
    $industry =  $industryn;
    } 
    $_SESSION['ni'] = 1;
    } 

$ip = $_SESSION["ip"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        if(isset($_COOKIE['reallat'])){
    $lat = $_COOKIE['reallat']; 
  }else{
        $lat = $_POST['jlat'];
      }
      if(isset($_COOKIE['reallong'])){
    $long = $_COOKIE['reallong']; 
  }else{
        $long = $_POST['jlong'];
      }
        $about = $_POST['about'];  

$staffreg = "INSERT INTO `users` (`id`, `type`, `BNAME`, `BNUMBER`, `BTYPE`, `email`, `about`,`country`,`city`, `p1`, `p2`, `industry`, `image`, `datejoined`, `password`,`reg_lat`,`reg_long`,`reg_ip`) 
VALUES (NULL, '1','$bname','$bno','$btype', '$email', '$about', '$country', '$city', '$p1', '$p2', '$industry', '$image', CURRENT_TIMESTAMP, '$password','$lat','$long','$ip')";
$regarray = $conn->query($staffreg);
if ($regarray === TRUE) {


  $to = "+254".$p1;
  $message = "Hallo ".strtoupper($bname)." , Welcome to FAMAPAL quick hiring - you were successfully registered. Please post jobs and get employees instantly .Kindly dont engage in malpractices. Thank you , we are honoured to have you.";
  sendmessage($to,$message);



  $message2  =  "Hey , ".strtoupper($bname)." - ".$to. " just joined FAMAPAL as an employer";
 sendmessage($adminno,$message2);



$tc = "text-success";
        $reg= 1;
        $nr = 0;



        //login starts here


        
$umail = $_POST['email'];
$upass = $_POST['password'];
if($umail == "" || !$umail || $upass == "" || !$upass){
session_destroy();
        $reg= 0;
        $nr = 1;
}else{
    $ev = "SELECT * FROM users WHERE email = '$umail' ";
    $evarray = $conn->query($ev);
    if ($evarray->num_rows > 0) {
    while($det = $evarray->fetch_array()){
    $upw = $det['password'];
    
    $uid = $det['id'];
    $utype = $det['type'];
    $_SESSION['jl'] = 1;
    $_SESSION['id'] = $det['id'];
    $_SESSION['email'] = $umail;
    $_SESSION['rating'] = $det['rating'];
    $_SESSION['country'] = $det['country'];
    $_SESSION['industry'] = $det['industry'];
    $_SESSION['city'] = $det['city'];
     $_SESSION['cid'] = $det['cid'];
    $_SESSION['p1'] = $det['p1'];
    $_SESSION['p2'] = $det['p2'];
    if($det['p1'] == ''){
      $_SESSION['phone'] = '+254'.$det['p2'];
    }else{
      $_SESSION['phone'] = '+254'.$det['p1'];
    }
    $_SESSION['image'] = $det['image'];
    $lat = $det['reg_lat'];
    $long = $det['reg_long'];
    $_SESSION['homelatlong'] = $lat.",".$long;
    $_SESSION['utype'] = $utype;
    $_SESSION['ut'] = 1;
    $ind = $_SESSION['industry'];
    
    
       //GET INDUSTRY ID IF EXISTS
   $industries = "SELECT * FROM skills WHERE industry_id = '$ind' ";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];      
    }}else{ 
    //SET NEW INDUSTRY
  
    $_SESSION['ni'] = 1;
    } 
    
    if($utype==1){
     $_SESSION['username'] = $det['bname'];





//WELCOME MESSAGE STARTS HERE

      echo "<script>window.location='?page=home';</script>"; 
    }
    elseif($utype==2){
     $_SESSION['username'] = $det['fname'];
      $_SESSION['lname'] = $det['lname'];




//WELCOME MESSAGE STARTS HERE

$recipients = $_SESSION['phone'];

// Set your message
$message    = "Hallo ".$det['fname'].", welcome to FAMAPAL , we will keep you updated with the latest job openings, Thank you and we are pleased to have you.";

//Create a new Instance 
$gateway  = new AfricasTalkingGateway($username, $apikey);

try
{
    $results = $gateway->sendMessage($recipients, $message);

    foreach ($results as $result){

    echo "Number:" .$result->number ;
    echo "Status:" .$result->status ;
    echo "Messageid:" .$result->messageId ;
    echo "Cost:" .$result->cost."\n";

  }
}

catch (AfricasTalkingGatewayException $e)
{
?>
<script type="text/javascript">
  alert("Error Sending the message: <?php echo $e->getMessage();?>");
</script>


<?php
   // echo "Error Sending the message: ".
}


    echo "<script>window.location='?page=home';</script>";
    }
    elseif($utype==3){
     $_SESSION['username'] = $det['cname'];
     $_SESSION['cid'] = $det['cid'];




//WELCOME MESSAGE STARTS HERE

$recipients = $_SESSION['phone'];

// Set your message
$message    = "Hallo ".$det['fname'].", welcome to FAMAPAL , post a job and get immediate labour, Thank you and we are pleased to have you.";

//Create a new Instance 
$gateway  = new AfricasTalkingGateway($username, $apikey);

try
{
    $results = $gateway->sendMessage($recipients, $message);

    foreach ($results as $result){

    echo "Number:" .$result->number ;
    echo "Status:" .$result->status ;
    echo "Messageid:" .$result->messageId ;
    echo "Cost:" .$result->cost."\n";

  }
}

catch (AfricasTalkingGatewayException $e)
{
?>
<script type="text/javascript">
  alert("Error Sending the message: <?php echo $e->getMessage();?>");
</script>


<?php
   // echo "Error Sending the message: ".
}
 //WELCOME MESSAGE ENDS HERE



    echo "<script>window.location='?page=home';</script>";
    }else{
    echo "<script>alert('".$utype."');</script>";
    }
 
    
    
    
    }}else{
    session_destroy();
        $reg= 0;
        $nr = 1;
    }
}

        //login ends here
} else {
session_destroy();
        $reg= 0;
        $nr = 1;
}
                                                              

  


  }else{

  session_destroy();
        $reg= 0;
        $nr = 1;

    }
    
    }


} 

?>
<script type="text/javascript"   src="js/custom.js"></script>    
<?php  if(isset($reg) && $reg == 1){?>

 <script>
            $(document).ready(function() {
            
            $("#clientreg").find("input[type=text],input[type=tel],input[type=file],input[type=email],input[type=password], textarea").val("");
            
            
             toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 100,
  "hideDuration": 1000,
  "timeOut": 1000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["success"]("", "REGISTERED SUCCESSFULLY") ;                                     
            
            
            
            
                                                                          
            $('#centralModalSuccess').modal('toggle');
            });
            </script>
<?php } ?>
   
<section class="form-gradient pgs">

    <!--Form with header-->
    <div class="card wow fadeInUp py-0 px-0">

        <!--Header-->
        
        <!--Header-->

        <div class="card-body mx-0 mt-0 py-0 px-0">
        
<?php  if($nr == 1){?>
<script>
 $(document).ready(function() {
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration":2000,
  "timeOut": 3000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("fill all fields correctly and try again", "ERROR !") ;
});
</script> 
<?php } ?>

<?php  if(isset($et) && $et == 1){?>
<script>
 $(document).ready(function() {
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration":2000,
  "timeOut": 3000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("The email you are trying to use already exists in this platform", "EMAIL ALREADY REGISTERED !") ;
});
</script> 
<?php } ?>           

      
        
        
        
<section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="margin-top: 0px !important;margin-bottom:0px !important;padding-top: 0px !important;border:2px solid <?php echo $tt; ?>;">

    <!--Section heading--> 
    
    <div class="nd"style="margin-bottom: 0px !important;" >
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    employer registration
    </span>
    </h4>

     
    </div>
    <script>
function goBack() {
    window.history.back();
}
</script>
    
    <!--Section description-->
    
    
<!-- <div class="text-center d-none">
    <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch Skills Modal</a>
</div> -->
  
      <div style="" class="mx-0 my-0">


      <div class="align-middle wow fadeInUp py-2 px-3 mx-0 my-0 d-none errordiv" id="regt">
      <span class="text-left text-center align-middle mt-1 mr-2 white-text text-white" ><i class="fas fa-exclamation-triangle" style=""></i>
        <span id="regerror">FILL ALL DETAILS</span></span>
    </div>

        <!--Grid column-->
        <div class="col-md-12 no-gutter">  
            <form id="clientregform" name="contact-form" action="#" method="POST" enctype="multipart/form-data">
                  <div class="row no-gutter">
                  <div class="row  mx-0 px-0">  
                <!--Grid row-->
                
                    <div class="col-12">
                    <div class="md-form md-outline">
                     <i class="fas fa-briefcase prefix"></i>
                            <input type="text" id="Bno" name="Bno" value="<?php  if(isset($_POST['Bno'])){echo $_POST['Bno'];} ?>" class="form-control">
                            <label for="Bno" class="">Business Number</label>
                        </div>
                 </div>
                
                <div class="col-12">
                  <div class="md-form md-outline">
                     <i class="fas fa-briefcase prefix"></i>
                            <input type="text" id="Bname" name="Bname" value="<?php if(isset($_POST['Bname'])){echo $_POST['Bname'];} ?>" class="form-control">
                            <label for="Bname" class="">Employer Name</label>
                        </div>
                  </div>
                    
                    
                   

                
                 
                     <!--Grid column-->
                    <div class="col-12">
                        <div class="md-form md-outline">
                          <i class="fas fa-envelope prefix"></i>
                            <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" class="form-control">
                            <label for="email" class="">employer email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                     <!--Grid column-->
                    <div class="col-12 vc" id="btborder">
                        <div class="md-form">
                           
                            
                                <select class="mdb-select colorful-select dropdown-secondary" id="btypeselect" name="btypeselect">
                <option value="" disabled selected>Choose Employer type</option>
      <?php 
    
    $industries = "SELECT * FROM businesstypes";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iname;?>"><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no industries set";
    }  
    ?>
</select>
                        </div>
                    </div>
                    <!--Grid column-->

                    
                
                    <!--Grid column-->
                    <div class="col-12">
                         <div class="border border-slight p-2 rounded mb-4 ig" >
    <div class="form-group ">
      <label for="phoneno" style="font-size:13px;">Phone Number</label>
      <div class="col-auto">
      <!-- Default input -->
      <label class="sr-only" for="phoneno">phone number</label>
      <div class="input-group ">
        <div class="input-group-prepend" style="background-color:white !important;">
          <div class="input-group-text font-weight-bold" style="background-color:white !important;color:<?php echo $dchex; ?>;">+254</div>
        </div>
        <input type="number" class="form-control py-0 " onkeyup="return test()"  name="p1" id="p1" length="9" placeholder="- - - - - - - - - " required>
        <div class="invalid-feedback">
          Please enter last 9 digits for phone number.
        </div>
      </div>
    </div>
    </div>
    </div>
                    </div>
                    <!--Grid column-->
                    <script type="text/javascript">
                     function test(){

   var pn = $("#p1").val().length;
        if (pn !== 9){
        $("#p1").removeClass("is-valid"); 
        $("#p1").addClass("is-invalid");
        }else{

        if(pn === 9){


         $('#p1').keypress(function(){


         if($(this).val().length < 9){
           return true;
        
         }else{
          return false;
        
         }

       
        

        }); 


        }

        $("#p1").removeClass("is-invalid"); 
        $("#p1").addClass("is-valid");

        }

}


function test2(){

   var pn = $("#p2").val().length;
        if (pn !== 9){
        $("#p2").removeClass("is-valid"); 
        $("#p2").addClass("is-invalid");
        }else{

        if(pn === 9){


         $('#p2').keypress(function(){


         if($(this).val().length < 9){
           return true;
        
         }else{
          return false;
        
         }

       
        

        }); 


        }

        $("#p2").removeClass("is-invalid"); 
        $("#p2").addClass("is-valid");

        }

}
                    </script>



                    
                     <!--Grid column-->
                     <div class="col-12">
                         <div class="border border-slight p-2 rounded mb-4 ig" >
    <div class="form-group ">
      <label for="phoneno" style="font-size:13px;">Phone Number 2</label>
      <div class="col-auto">
      <!-- Default input -->
      <label class="sr-only" for="phoneno">phone number 2</label>
      <div class="input-group ">
        <div class="input-group-prepend" style="background-color:white !important;">
          <div class="input-group-text font-weight-bold" style="background-color:white !important;color:<?php echo $dchex; ?>;">+254</div>
        </div>
        <input type="number" class="form-control py-0 " onkeyup="return test2()"  name="p2" id="p2" length="9" placeholder="- - - - - - - - - " required>
        <div class="invalid-feedback">
          Please enter last 9 digits for phone number 2.
        </div>
      </div>
    </div>
    </div>
    </div>
                    </div>
                    <!--Grid column-->

                

                
                     <input type="hidden"  value="<?php echo $_SESSION['city'].' , '.$_SESSION['country']; 
?>" id="pac-input" name="pac-input" placeholder="Enter your address" class="form-control">

                   <input id="ip" name="ip" type="hidden" value="<?php  echo $_SESSION['realip']; ?>">
<input id="jlat" name="jlat" type="hidden" value="<?php echo $_COOKIE['reallat']; ?>">
<input  id="jlong" name="jlong" type="hidden" value="<?php echo $_COOKIE['reallong']; ?>">
<input  id="city" name="city" type="hidden" value="<?php echo $_SESSION['city']; ?>">
<input  id="country" name="country" type="hidden" value="<?php echo $_SESSION['country']; ?>">
                    
                    
                            <input type="hidden"  value="<?php
                           echo $_SESSION['city'].' , '.$_SESSION['country']; 

                            
                            ?>" id="zip" name="zip" class="form-control">

                    <!--Grid column-->
                     <div class="col-12 db" id="industryborder"> 
                <div class="">
                <select class="mdb-select colorful-select dropdown-secondary" id="industryselect" name="industryselect">
                <option value="" disabled selected>Choose your Industry</option>
      <?php 
    
    $industries = "SELECT * FROM industries";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iname;?>"><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no industries set";
    }  
    ?>
</select>
<label class="d-none d-lg-block d-xl-block">INDUSTRY</label>
</div>
</div>
               
                <!--Grid row-->

                <!--Grid row-->
                
                 <div class="col-md-4 ">
                <div class="md-form ">
                  <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">ABOUT EMPLOYER</label>
    <textarea class="form-control z-depth-1 vc  ta" id="about" name="about" length="200"  maxlength="200" rows="3" placeholder="Enter business vision,mission,motto etc..."></textarea>
</div>
            </div>
            </div>
            
              
                    
                
                   <div class="col-12">
                        <div class="md-form md-outline">
                          <i class="fas fa-lock prefix"></i>
                            <input type="password" id="password" name="password" class="form-control">
                            <label for="password" class="">Set Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="md-form md-outline">
                          <i class="fas fa-lock prefix"></i>
                            <input type="password" id="passwordc" name="passwordc" class="form-control">
                            <label for="passwordc" class="">Confirm Password</label>
                        </div>
                    </div>

                <!--Grid row-->
                 </div>
                 <div class="col-md-4 "> 
                 
                
                    
                 
                 

    <div class="file-field big ">
<div class="container" >

<center>
<div id="image_preview"><img id="previewing" src="uploads/profileimages/cl.jpg" class="rounded-circle img-fluid z-depth-2"style="height:100px !important;width:100px !important;" /></div>
 <div id="message" class="<?php echo $tc;?> text-bold font-weight-bold my-1">
     <?php 
     if($imageerr != ""){
     echo $imageerr;
     }
     
     ?>
     </div>

    <div class="form-group" >
    
    <div class="file-field big" >
         
        <div class="btn-floating btn-sm purple lighten-1 mt-3 float-left" >
            <i class="fa fa-paperclip" aria-hidden="true"></i>
             <input type="file" accept="image/*" id="image" name="image" value="uploads/profileimages/bu.png">
         </div>
         
        
        <div class="file-path-wrapper">
           <input class="file-path validate" id="ptt" type="text" placeholder="Upload Employer Logo" readonly="readonly">
        </div>  
        <div id="imagename" class="d-none"></div>
    </div>                                           
    
       
        <img id='img-upload'/>
    </div>
    
</center>
  
    

        <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#imagename").val(fileName);
        });
    });
</script>
    
    
    
    
    
    
</div> 
</div>





    <div class="">
             <!--Card-->
    <div class="card card-cascade narrower mb-2 d-none">

      <!--Card image-->
      <div class="card-header gradient-card-header secondary text-white text-center" style="background-color: <?php echo $tt; ?>;">
      Enter your precise address
      </div>
      <!--/Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center" style="margin-top:0px !important;padding-top:0px !important;">
      
      <div class="md-form">
                            <input type="text"  placeholder="Enter your address" class="form-control">
                        </div>

                     <!--Google map-->
<div id="admap" class="z-depth-0" style="height:320px"></div>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->
            



<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script> 



</div>  
                    <div class="" id="imagev" style="color:red;"> </div>  
                    
                    
                    
                    
                    
                    
<div class="card d-none">

<div class="pac-card card-header" id="pac-card">
      <div>
        <div id="type-selector" class="pac-controls d-none">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls d-none">
          <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>   
      </div>
      
    </div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>

 
</div>     
                    <script>
                    $("#image").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p class='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});

function imageIsLoaded(e) {
$("#image").css("color","green");

$("#ptt").removeClass("invalid");
$("#ptt").toggleClass("valid");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '100px');
$('#previewing').attr('height', '100px');
};
                    
                    
                    </script>




              
                
                
                
                 
                 </div>    
                 </div>                 
                <!--Grid row-->
                
                     <button type="submit" name="fsub" id="fsub" class="d-none">SUBMIT</button> 

            </form>


            
          
            
             <center>
            <button class="btn btn-rounded  " id="clientreg" name="clientreg" staff="width:50%;" style="background-color: <?php echo $tt; ?>;margin-bottom: 0% !important;">
            <i class="fa fa-check" aria-hidden="true"></i>&nbsp;
             REGISTER </button> 
            </center> 

            
                                                         
            
            <div class="status"></div>
             <div class="" style="width:100% !important;margin-top: 0px !important;margin-bottom: 10px !important;">
                <div class="mr-2 mt-0" style="margin-bottom: 0px !important;">
                <p class="font-small  d-flex justify-content-end mt-0" style="font-weight: normal !important;">employee? <a href="?page=staffregister" class=" ml-1" style="color:<?php echo $tt; ?> !important;"><u>employee registration</u></a></p>
            </div> 
            </div>
        </div>
        <!--Grid column-->







    </div>
    <script>
       $("#clientreg").click(function() {
        var bname = $("#Bname").val();
        var btype = $("#btypeselect").val();
        var email = $("#email").val();
        var p1 = $("#p1").val();
        var p2 = $("#p2").val();
        var add = $("#pac-input").val();
        var zip = $("#zip").val();
        var industry = $("#industryselect").val();
        var country = $("#countryselect").val();
        var city = $("#selectcity").val();
        var image = $("#image").val();
        var about = $("#about").val();
        var password = $("#password").val();
        var passwordc = $("#passwordc").val();
        var jlat = $("#jlat").val();
        var jlong = $("#jlong").val();


              function ed(){
          $(".vc").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger"); 
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");

   $("#industryselect").removeClass("invalid"); 
  $("#regt").addClass("d-block");

         }
        
        
if(bname === "" || bname === null){

 ed();
 $("#regerror").text("input business name to continue"); 
 $("#Bname").toggleClass("invalid"); 


}
else if(btype === "" || btype === null){

 ed();
 $("#btborder").addClass("border border-danger"); 
 $("#regerror").text("select business type to continue"); 


}
else if(email === "" || email === null){

 ed();
 $("#regerror").text("input email to continue"); 
 $("#email").toggleClass("invalid"); 

}
else if(p1 === "" && p2 === ""){
 ed();
 $("#regerror").text("input phone number to continue"); 
 $("#p1").toggleClass("invalid"); 
  $("#p2").toggleClass("invalid");

}else if(p1.length !== "" && p1.length !== 9){
 ed();
 $("#regerror").text("enter 9 numbers only phone number"); 
 $("#p1").toggleClass("invalid"); 

}else if(p2.length !== "" && p2.length !== 9){
 ed();
 $("#regerror").text("enter 9 numbers only phone number 2"); 
 $("#p2").toggleClass("invalid"); 

}
else if(add === "" || add === null){

 ed();
 $("#regerror").text("input address to continue");
 $("#pac-input").toggleClass("invalid"); 


}

else if(industry === "" || industry === null){


 ed();
 $("#regerror").text("Enter industry to continue");
 $("#industryselect").toggleClass("invalid"); 

}

else if(about === "" || about === null){

 ed();
 $("#regerror").text("Enter about section to continue");
 $("#about").addClass("border border-danger");


}
else if(image === "" || image === null || image === 'uploads/profileimages/cl.jpg'){

 ed();
 $("#regerror").text("please upload business logo to continue");
}
else if(password === "" || password === null){

 ed();
 $("#regerror").text("please set a password to continue");
 $("#password").toggleClass("invalid"); 

}
else if(password.length < 6){

 ed();
 $("#regerror").text("password too short set a longer");
 $("#password").toggleClass("invalid"); 

}
else if(passwordc === "" || passwordc === null){

 ed();
 $("#regerror").text("please confirm your password to continue");
 $("#passwordc").toggleClass("invalid"); 

}
else if(password !== passwordc){


 ed();
 $("#regerror").text("password and confirmation dont match please set a password you can easily remember");
 $("#password").toggleClass("invalid");  
 $("#passwordc").toggleClass("invalid"); 

}else{

$("#fsub").click();
}
       });
    </script>


    <!-- <div class="uc" style="width:100% !important;height:20px;">
            </div> -->



</section>
<!--Section: Contact v.2-->

            <!--Grid row-->
        </div>

    </div>
    <!--/Form with header-->

</section>
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
             <center>
            <p class="heading lead">REGISTERED SUCCESSFULLY</p>
            </center>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <p><?php echo $nm; ?> ,Welcome to RONIN,<br />
                Its a pleasure having you here ,we will ensure you get the best possible staff at your premises in the fastest way possible,  we look forward to your parcipation and cooperation.
                </p>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a type="button" href="?page=login" class="btn btn-success">Login Now <i class="fa fa-diamond ml-1"></i></a>
            <a type="button" href="?page=home" class="btn btn-outline-success waves-effect">No, Later</a>
        </div>
    </div>
    <!--/.Content-->
</div>
</div>  
<!--Modal: Login / Register Form-->
    
    
     