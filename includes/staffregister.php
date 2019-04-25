<style type="text/css">
  .fas{
    color: <?php echo $tt; ?> !important;
  }
</style>
<?php


/*$ip = file_get_contents('https://api.ipify.org');*/

//END OF GET LOCATION THROUGH IP ADDRESS     

//SET LOCATION VARIABLES




$imageerr='click paperclip to upload profile picture';   
$reg=0;
$nr = 0;
$nm = "HALLO";
$nc = "";
$tc = "text-danger";
$et = "";
if(isset($_POST['fsub'])){



$email = $_POST['email'];
$ev = "SELECT * FROM users WHERE email = '$email' ";
    $evarray = $conn->query($ev);
    if ($evarray->num_rows > 0) {
    $et = 1;
   
    }else{
    $et = 0;
    //IMAGE UPLOAD CODE COMES HERE 
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
          
        //REGISTER STAFF 
        
$fname = $_POST['fname'];
$nm = $fname;
$lname = $_POST['lname'];
$email = $_POST['email'];
$p1 = $_POST['p1'];
$p2 =  $_POST ['p2'];
$add = $_POST['pac-input'];
$zip = $_POST['zip'];
$industry = $_POST['industryselect'];
$skillss = $_POST['skillselect'];
$skills = serialize($skillss); 
$image = $target_file;
$password = $_POST['password'];
$password = md5($password);
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
        /*$about = $_POST['about'];*/
        $about = "A valued employee at FAMAPAL";
        
        

$staffreg = "INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `email`, `about`,`country`,`city`, `p1`, `p2`, `industry`, `skills`, `image`,`datejoined`, `password`,`reg_lat`,`reg_long`,`reg_ip`) 
VALUES (NULL, '2', '$fname', '$lname', '$email', '$about', '$country', '$city', '$p1', '$p2', '$industry', '$skills', '$image', CURRENT_TIMESTAMP, '$password','$lat','$long','$ip')";
$regarray = $conn->query($staffreg);






if ($regarray === TRUE) {

foreach ($skillss as $skill) {
$skillreg = "INSERT INTO `staff_skills` (`staff_email`, `industry_id`, `skill_id`, `datecreated`, `dateupdated`, `id`) VALUES ('$email', '$industry', '$skill', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL)";
$skarray = $conn->query($skillreg);
}

   
  //LOGIN FUNCTION COMES IN HERE




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
    $_SESSION['image'] = $det['image'];
    $lat = $det['reg_lat'];
    $long = $det['reg_long'];
    $_SESSION['homelatlong'] = $lat.",".$long;
    $_SESSION['utype'] = $utype;
    $_SESSION['ut'] = 2;
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
      echo "<script>window.location='?page=home';</script>"; 
    }
    elseif($utype==2){


     $_SESSION['username'] = $det['fname'];
      $_SESSION['lname'] = $det['lname'];


//WELCOME MESSAGE STARTS HERE
if($_SESSION['p1'] == ''){
  $_SESSION['phone'] = $_SESSION['p2'];
}else{
  $_SESSION['phone'] = $_SESSION['p1'];
}
$recipients = "+254".$_SESSION['phone'];
$recipient = "254".$_SESSION['phone'];

// Set your message
$message    = "Hallo ".strtoupper($det['fname'])." , Welcome to FAMAPAL  quick hiring - You were successfully registered. We will keep you updated with the latest job openings, Please select and employer and queue to get hired. Kindly, dont engage in malpractices. Thank you and we are pleased to have you. All the best.";

sendmessage($recipients,$message);


$message2  =  "Hey , ".strtoupper($det['fname'])." - ".$recipients. " just joined FAMAPAL as an employee";
sendmessage($adminno,$message2);

//Create a new Instance 

    echo "<script>window.location='?page=home';</script>";
    }

   
    
    
    
    
    }}else{
    session_destroy();
        $reg= 0;
        $nr = 1;
    }
}





  //LOGIN FUNCTION ENDS HERE
$notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'newstaffundercontractor', '$sid', '$contsid', 'Has signed up using your contractor id', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);





$tc = "text-success";
        $reg= 1;
        $nr = 0;
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
  }}

?>    


<?php  if($reg == 1){?>

 <script>
            $(document).ready(function() {
             
             $("#staffregform").find("input[type=text],input[type=tel],input[type=file],input[type=email],input[type=password], textarea").val("");
            
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
<?php  if($et == 1){?>
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
<?php  if($nc == 1){?>
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
  "showDuration": 1000,
  "hideDuration":3000,
  "timeOut": 3000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("please ask your contractor for correct contractor id to continue", "CONTRACTOR ID DOESNT EXIST!") ;
  $("#cont_id").addClass("invalid"); 
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

      
            
<section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="margin-top: 0px !important;padding-top: 0px !important;border:2px solid <?php echo $tt; ?>">

    <!--Section heading--> 
    
    <div class="nd" style="margin-bottom: 0px !important;" >
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    employee registration
    </span>
    </h4>

     
    </div>
    <script>
function goBack() {
    window.history.back();
}
</script>
    
    
    <!--Section description-->
    
    
<div class="text-center d-none">
    <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch Skills Modal</a>
</div>

    <div style="" class="mx-0 my-0">

    <div class="align-middle wow fadeInUp py-2 px-3 mx-0 my-0 d-none errordiv" id="regt">
      <span class="text-left text-center align-middle mt-1 mr-2 white-text text-white" ><i class="fas fa-exclamation-triangle" style=""></i>
        <span id="regerror">FILL ALL DETAILS</span></span>
    </div>

        <!--Grid column-->
        <div class="col-md-12 no-gutter">  
            <form id="clientregform" name="contact-form" class="needs-validation " action="#" method="POST" enctype="multipart/form-data">
                  <div class="row no-gutter">
                  <div class="row  mx-0 px-0">   
                <!--Grid row-->
                
                    <!--Grid column-->
                    <!-- <div class="col-12">
                        <div class="md-form">
                            <input type="text" value="<?php if(isset($_POST['cont_id'])){echo $_POST['cont_id'];} ?>" id="cont_id" name="cont_id" class="form-control">
                            <label for="name" class="">Contractor ID</label>
                        </div>
                    </div> -->
                    <!--Grid column-->
                    
                     <!--Grid column-->
                    <div class="col-12">
                        

                        <!-- Material outline input with prefix-->
<div class="md-form md-outline">
  <i class="fas fa-user prefix"></i>
  <input type="text"  value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" id="fname" name="fname" class="form-control " required>
  <label for="fname">Firstname</label>
</div>
                    </div>
                    <!--Grid column-->
                    
                     <!--Grid column-->
                    <div class="col-12">
                        <div class="md-form md-outline">
  <i class="fas fa-user prefix"></i>
  <input type="text" id="lname"  value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" name="lname" class="form-control" required>
  <label for="lname">Lastname</label>
</div>
       
                    </div>
                    <!--Grid column-->

                   
                
                <!--Grid column-->
                    <div class="col-12">
                        <div class="md-form md-outline">
                          <i class="fas fa-envelope prefix"></i>
                            <input type="text" id="email"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>

                        <!-- Outline validation input -->

                    </div>
                    <!--Grid column-->

                    <div class="col-12 db" id="genderborder"> 
                <div class="">
                    <select class="mdb-select colorful-select dropdown-secondary" id="genderselect" name="genderselect">
                <option value="" disabled selected>Select your gender</option>
                <option value="male">male</option>
                <option value="female">female</option>
              </select>
            </div>
          </div>
                    
                
                    
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
                            
                <!--Grid row-->
                
                <!--Grid row-->
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
       <option value="<?php echo $iid;?>"><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no industries set";
    }  
    ?>
</select>
<label class="d-none d-lg-block d-xl-block">INDUSTRY</label>
</div>
</div>

                    <!--Grid column-->
                    <div class="col-12 db"  id="skillsborder">   
                    
                    
                                            
<select class="mdb-select colorful-select dropdown-secondary" style="text-align:center;"multiple searchable="Search Skill.." id="skillselect" name="skillselect[]">
    <option value="" disabled selected>Select Industry First</option> 
</select> 
<label class="d-none d-lg-block d-xl-block">SKILLS</label> 
            
 
 
 
 
 
            

                    </div>

                <!--Grid row-->
                
                <div class="col-md-4 d-none">
                <div class="md-form ">
                  <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">ABOUT ME</label>
    <textarea class="form-control z-depth-1  ta" id="about" name="about" length="200"  maxlength="200" rows="3" placeholder="Describe yourself,experience,achievements etc..." value="employee at FAMAPAL">employee at FAMAPAL</textarea>
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
               

                
                 </div>
                 <div class="col-md-4"> 
                 
                
                    
                 
                 

    <div class="file-field big ">
<div class="container" >
    <center>
<div id="image_preview"><img id="previewing" src="uploads/profileimages/bu.png" class="rounded-circle img-fluid z-depth-2 border border-3 border-succcess"style="height:100px !important;width:100px !important;border-width:5px !important;" /></div>
 <div id="message" class="<?php echo $tc;?> text-bold font-weight-bold my-1">
     <?php 
     if($imageerr != ""){
     echo $imageerr;
     }
     
     ?>
     </div>

    <div class="form-group" >
    
    <div class="file-field big" >
         
        <div class="btn-floating btn-sm purple lighten-1 mt-3 float-left" style="background-color:<?php echo $tt; ?> !important;">
            <i class="fa fa-paperclip" aria-hidden="true"></i>
            <input type="file" accept="image/*" id="image" name="image" value="uploads/profileimages/bu.png">
         </div>
         
    
        <div class="file-path-wrapper">
           <input class="file-path validate" id="ptt" type="text" placeholder="Upload your image" readonly="readonly">
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


<div class="my-2 mx-2" >
<div class="  mt-3">
<div class="md-form">


      <div class="md-form d-none" class="">
            
            
            
            
            
            
            
            
            
            
               <!--Card-->
    <div class="card card-cascade narrower">

      <!--Card image-->
      <div class="card-header gradient-card-header secondary text-white text-center" style="background-color: <?php echo $tt; ?>;">
      Move the red pin to your precise location
      </div>
      <!--/Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center" style="margin-top:0px !important;padding-top:0px !important;">

                     <!--Google map-->
<div id="map-container-3" class="z-depth-0" style="height: 200px"></div>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->
            



<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script> 

  
<script>
function custom_map() {

var var_location = new google.maps.LatLng(<?php echo $_SESSION["latitude"].",".$_SESSION["longitude"];?>);

var var_mapoptions = {
center: var_location,
zoom: 14,
styles: [
{
"featureType": "administrative",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},  
{
"featureType": "poi",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "road",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "water",
"elementType": "all",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "transit",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "landscape",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "road.highway",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "road.local",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "road.highway",
"elementType": "geometry",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "road.arterial",
"elementType": "all",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "water",
"elementType": "all",
"stylers": [
{
"color": "#5f94ff"
},
{
"lightness": 26
},
{
"gamma": 5.86
}
]
},
{
"featureType": "road.highway",
"elementType": "all",
"stylers": [
{
"weight": 1
},
{
"saturation": 85
}
]
},
{
"featureType": "landscape",
"elementType": "all",
"stylers": [
{
"hue": "#0066ff"
},
{
"saturation": 74
}
]
}
]
};

var var_map = new google.maps.Map(document.getElementById("map-container-3"),
var_mapoptions);

var var_marker = new google.maps.Marker({
position: var_location,
map: var_map,
label: {
    color : "black",
    fontWeight: "bold",
    text: "Move Me"
    },       
    draggable:true,
    title:"Drag me!"
});  

function handleEvent(event) {
   var lat = event.latLng.lat();
   var lng = event.latLng.lng();
   $("#jlong").val(lng);
   $("#jlat").val(lat);
   $.post("ajax/getloc.php?lat="+lat+"&lng="+lng+"&page="+"reg", function(data) {
   var result = $.parseJSON(data);
   var country1 = result[1];
   var city = result[0];
   
   
   if (country1 !==""){
     $("#country").load(country1);
     $("#city").val(city);
  }else{
  $("#country").load(city);  
  $("#country").val(city);  
  }
   });
   }
var_marker.addListener("drag", handleEvent);  
  
}  

google.maps.event.addDomListener(window, 'load', custom_map);            


</script>

            
            </div>
                        
                        
</div>
</div>
</div>

                     
                    <div class="" id="imagev" style="color:red;"> </div>   
                    
                    
                    
    <div class="d-none">
             <!--Card-->
    <div class="card card-cascade narrower mb-2">

      <!--Card image-->
      <div class="card-header gradient-card-header secondary text-white text-center" style="background-color: <?php echo $tt; ?>;">
      Enter your precise address
      </div>
      <!--/Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center" style="margin-top:0px !important;padding-top:0px !important;">
      
      <div class="md-form">
                           
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
                
                <div class="center-on-small-only" >
               
            </div>  
            <span class="d-none" id ="vc"></span>
            
              <button type="submit" name="fsub" id="fsub" class="d-none" >SUBMITT</button>     
              <div id="reg" class="d-none"value="<?php echo $reg; ?>"><?php echo $reg; ?></div>             
            </form>



            <center>
            <button class="btn btn-secondary btn-rounded  " id="staffreg" name="staffreg" style="width:50%;background-color:<?php echo $tt; ?> !important;margin-bottom: 0% !important;">
            <i class="fa fa-check" aria-hidden="true"></i>&nbsp;
             REGISTER </button> 
            </center>                                                           
            
            <script> 
            
              $("#cont_id").keyup(function(event){
       if(event.keyCode != 13){
       var contid = $(this).val();
       $.post("ajax/verifycontractor.php?cid="+contid, function(data) {
      $("#vc").val(data);
      if(data !== "1"){
      $("#cont_id").addClass("invalid");  
       $("#cont_id").removeClass("text-success");
       $("#cont_id").removeClass("text-danger");
       $("#cont_id").addClass("text-danger");
       
       
      }else{  
        $("#cont_id").removeClass("invalid");  
       $("#cont_id").removeClass("text-danger");
        $("#cont_id").removeClass("text-success");
       $("#cont_id").addClass("text-success");
      }
      });  
      }
     }); 
             
            
                                                
            
            $("#staffreg").click(function() {


             
            var contid = $("#cont_id").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var p1 = $("#p1").val();
            var p2 = $("#p2").val();
            var add = $("#pac-input").val();
            var zip = $("#zip").val();
            var country = $("#countryselect").val();
            var city = $("#selectcity").val();
            var industry = $("#industryselect").val();
            var skills = $("#skillselect").val().toString(); 
            var about = $("#about").val();
            var image = $("#image").val();
            var cv = $("#resume").val();
            var password = $("#password").val();
            var passwordc = $("#passwordc").val(); 
            var imagename = $("#ptt").val(); 
            var jlat = $("#jlat").val();
            var jlong = $("#jlong").val();
            
                 
              
              var contv = $("#vc").val();
         function ed(){
          $(".db").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger"); 
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");
  $("#regt").addClass("d-block");
   }



if(fname === "" || fname === null){ 

 ed();
 $("#fname").toggleClass("invalid"); 
 $("#regerror").text("input first name to continue"); 

}
else if(lname === "" || lname === null){ 

ed();
 $("#lname").toggleClass("invalid"); 
 $("#regerror").text("input last name to continue"); 

}else if(email === "" || email === null){ 

 ed();
 $("#email").toggleClass("invalid"); 
 $("#regerror").text("input email to continue"); 

}else if(p1 === "" && p2 === ""){
 ed();
 $("#regerror").text("input a phone number to continue"); 
 
 if(p1 === ""){
 $("#p1").toggleClass("invalid");  
 }
 if(p2 === ""){
 $("#p2").toggleClass("invalid");  
 }


}else if(p1.length !== "" && p1.length !== 9){
 ed();
 $("#regerror").text("enter 9 numbers only phone number"); 
 $("#p1").toggleClass("invalid"); 

}else if(add === "" || add === null){ 

ed();
 $("#pac-input").toggleClass("invalid"); 
 $("#regerror").text("input your address to continue"); 

}else if(zip === "" || zip === null){ 


ed();
 $("#zip").toggleClass("invalid"); 
 $("#regerror").text("input zip to continue");  


}else if(about === "" || about === null){

ed();
 $("#regerror").text("input your about to continue"); 
 $("#about").addClass("border border-danger"); 


}else if(industry === "" || industry === null){ 
ed();
 $("#industryborder").addClass("border border-danger"); 
 $("#regerror").text("select your industry to continue"); 
  
}else if(skills === "" || skills === null || skills === 0){ 
ed();
 $("#skillsborder").addClass("border border-danger"); 
 $("#regerror").text("select your skills to continue"); 
}else if(jlat === "" || jlat === null || jlong === "" || jlong === null ){ 

ed();
 $("#regerror").text("oops! we couldnt get your location, enable location/GPS to continue");  




}else if(password === "" || password === null){ 

ed();
 $("#regerror").text("set a password to continue");  
 $("#password").toggleClass("invalid");

}else if(password.length < 6 ){ 

ed();
 $("#regerror").text("password too short, enter longer password");  
 $("#password").toggleClass("invalid");

}else if(passwordc === "" || passwordc === null){ 

ed();
 $("#regerror").text("confirm your password to continue");  
 $("#passwordc").toggleClass("invalid");

}else if(password !== passwordc ){ 
ed();
 $("#regerror").text("password and confirmation dont match, please enter a password you can easily remember");  
 $("#passwordc").toggleClass("invalid");
 $("#password").toggleClass("invalid"); 

}else{
   $("#map-container-3").removeClass("border border-danger"); 



if(imagename === "" || imagename === null) {

  ed();
 $("#regerror").text("please upload a profile picture");  
 $("#ptt").toggleClass("invalid"); 



}else{
 $("#about").removeClass("border border-danger");
 $("#map-container-3").removeClass("border border-danger"); 
$("#fsub").click();  
}  
}
     
});
            
            
            
            </script>  
            
     
            <div class="status"></div>
               <div class="" style="width:100% !important;margin-top: 0px !important;margin-bottom: 9% !important;">
                <div class="mr-2 mt-0" style="margin-bottom: 0px !important;">
                <p class="font-small  d-flex justify-content-end mt-0" style="font-weight: normal !important;">employer? <a href="?page=clientregister" class=" ml-1" style="color:<?php echo $tt; ?> !important;"><u>employer registration</u></a></p>
            </div> 
            </div>
        </div>
        <!--Grid column-->

    </div>

</section>

            <!--Grid row-->
        </div>

    </div>
    <!--/Form with header-->

</section>
<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
             <center>
            <p class="heading lead">YOU ARE ON FAMAPAL !</p>
            </center>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <center><B>REGISTRATION SUCCESSFULL</B></center>
                <p><?php echo $nm; ?> ,Welcome to FAMAPAL,<br />
                Its a pleasure having you here ,we value you and will do our best and ensure you get hired fast and respected,  we look forward to your parcipation and cooperation.
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


<!-- Central Modal Medium Success-->   
<script>

function validate(){

         if( document.staff.cont_id.value == "" )
         {
              toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
   Command: toastr["error"]("please enter the ID of your contractor", "ENTER CONTRACTOR ID!");

  $("#deladd").addClass("emptyclass");

 return false;
         }





}

</script>

<script type="text/javascript">
  $("#alert-target").click(function () {
toastr["info"]("I was launched via jQuery!")
});
</script>