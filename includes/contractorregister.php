 <?php
$imageerr='click paperclip to upload image';
$reg=0;
$nr = 0;
$nm = "Hallo";
$cidd = "Being Processed";
$tc = "text-danger";


if(isset($_POST['fsub'])){

$email = $_POST['email'];
$ev = "SELECT * FROM users WHERE email = '$email' ";
    $evarray = $conn->query($ev);
    if ($evarray->num_rows > 0) {
    $et = 1;
    }else{
    $et = 0;
          
        //REGISTER STAFF 
$cno = $_POST['cno'];
$cname = $_POST['cname'];
$cidd  = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
$nm = $cname;
$email = $_POST['email'];
$p1 = $_POST['p1'];
$p2 =  $_POST ['p2'];
$add = $_POST['add'];
$zip = $_POST['zip'];
$industryn = $_POST['industryselect'];
$image = "uploads/profileimages/1541333686roninbg.png";
$password = $_POST['password'];




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
         $lat = $_POST['jlat'];
        $long = $_POST['jlong']; 
        $about = $_POST['about'];
$staffreg = "INSERT INTO `users` (`id`, `type`, `cnumber`, `cname`, `email`, `about`,`country`,`city`,`cid`, `p1`, `p2`, `industry`, `image`, `datejoined`, `password`,`reg_lat`,`reg_long`,`reg_ip`) 
VALUES (NULL, '3','$cno','$cname','$email','$about', '$country', '$city', '$cidd', '$p1', '$p2', '$industry', '$image', CURRENT_TIMESTAMP, '$password','$lat','$long','$ip')";
$regarray = $conn->query($staffreg);
if ($regarray === TRUE) {
$tc = "text-success";
        $reg= 1;
        $nr = 0;
} else {
session_destroy();
        $reg= 0;
        $nr = 1;
}
                                                              
        
  
    
    
    }  



} 
//

?>
<?php  if($reg == 1){?>

 <script>
            $(document).ready(function() {
                 $("#conreg").find("input[type=text],input[type=tel],input[type=file],input[type=email],input[type=password], textarea").val("");
            
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

      
            
 <section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0">

    <!--Section heading--> 
    
    <div style="background-color: <?php echo $tt; ?>;color:white;width:100%;" >
    
    <h4 class="mx-0 my-0 p-0" > 
    <a href="#" class="text-white" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    contractor registration
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
    <div style="border:2px solid <?php echo $tt; ?>;" class="row no-gutter mx-0 my-0">

        <!--Grid column-->
        <div class="col-md-12 no-gutter">  
            <form id="clientregform" name="contact-form" action="#" method="POST" enctype="multipart/form-data">
                  <div class="row no-gutter">
                  <div class="row  mx-0 px-0">   
                <!--Grid row-->
                     
                <div class="col-md-4 col-6">
                    <div class="md-form">
                            <input type="text" id="cno" name="cno" value="<?php echo $_POST['cno'];?>" class="form-control">
                            <label for="cno" class="">Contractor Business Number</label>
                        </div>
                 </div>
                
                <div class="col-md-4 col-6">
                  <div class="md-form">
                            <input type="text" id="cname" name="cname" value="<?php echo $_POST['cname'];?>" class="form-control">
                            <label for="cname" class="">Contractor Name</label>
                        </div>
                  </div>

                  
                    <!--Grid column-->
                    <div class="col-md-4 ">
                        <div class="md-form">
                            <input type="email" id="email" name="email" value="<?php echo $_POST['email'];?>" class="form-control">
                            <label for="email" class="">Contractor Email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                  
                
                 
                   <!--Grid column-->
                    <div class="col-md-4 ">   
                    <div class="md-form">
 <input type="search" id="industryselect" name="industryselect" value="<?php echo $_POST['industryselect']; ?>" class="form-control mdb-autocomplete">
    <button class="mdb-autocomplete-clear">
        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
            <path d="M0 0h24v24H0z" fill="none" />
        </svg>
    </button>
    <label for="form-autocomplete" class="active">MAIN industry ?</label>
</div>
<?php 
echo '
<script>
$(document).ready(function() {
var states = [
';
?>
<?php
    $industries = "SELECT * FROM industries ORDER BY `id` ASC limit 1,18446744073709551615";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
  
    echo '"'.$iname.'",';
    }}
 ?>    
     
<?php echo'  
    "FILM & FILM MAKING"
     ];

$("#industryselect").mdb_autocomplete({
    data: states
});
});
</script>
'
?>

                    </div>
                    
                    
                 
                    
                    
                
                    <!--Grid column-->
                    <div class="col-md-4 col-6">
                        <div class="md-form">
                            <input type="tel" id="p1" name="p1" value="<?php echo $_POST['p1'];?>" class="form-control">
                            <label for="p1" class="">Phone 1</label>
                        </div>
                    </div>
                    <!--Grid column-->
                    
                     <!--Grid column-->
                    <div class="col-md-4 col-6">
                        <div class="md-form">
                            <input type="tel" id="p2" name="p2" value="<?php echo $_POST['p2'];?>" class="form-control">
                            <label for="p2" class="">Phone 2</label>
                        </div>
                    </div>
                    <!--Grid column-->

                
                
                <div class="col-md-6 col-6">
                        <div class="md-form">
                            <input type="text" id="add" name="add" value="<?php echo $_POST['add'];?>" class="form-control">
                            <label for="add" class="">Address</label>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 col-6">
                        <div class="md-form">
                            <input type="text" id="zip" name="zip" value="<?php echo $_POST['zip'];?>" class="form-control">
                            <label for="zip" class="">ZIP/Postal code</label>
                        </div>
                    </div>
                    
                    
               
                <!--Grid row-->

                <!--Grid row-->
                
                <div class="col-md-4 col-6">
                <div class="md-form ">
                  <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">ABOUT ME</label>
    <textarea class="form-control z-depth-1  ta" id="about" name="about" length="200"  maxlength="200" rows="8" placeholder="Describe yourself,experience,achievements etc..."></textarea>
</div>
            </div>
            </div>
            
                            
                                     <div class="col-md-4 col-6">
                     <div class="md-form">
                                 <div class="">
                <select class="mdb-select colorful-select dropdown-secondary" id="countryselect" name="countryselect">
                <option value="" disabled selected>Choose Country</option>
      <?php 
    
    $industries = "SELECT * FROM countries";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iid;?>"><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no countries set";
    }  
    ?>
</select>
<label>COUNTRY</label>
</div>
                        </div>
                    </div>
                    
               <div class="col-md-4 col-6">
                <div class="md-form">
                                                                       
<select class="mdb-select colorful-select dropdown-secondary" style="text-align:center;" searchable="Search City.." id="selectcity" name="selectcity">
    <option value="" disabled selected>Select City</option> 
</select>
<label>CITY</label>
                        </div>
                    
                </div>
                <!--Grid row-->
                   <div class="col-md-6 col-6">
                        <div class="md-form">
                            <input type="password" id="password" name="password" class="form-control">
                            <label for="password" class="">Set Password</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="md-form">
                            <input type="password" id="passwordc" name="passwordc" class="form-control">
                            <label for="passwordc" class="">Confirm Password</label>
                        </div>
                    </div>

                <!--Grid row-->
                 </div>
                 <div class="d-none"> 
                 
                    <div class="file-field big ">
<div class="container" >
  <center>
<div id="image_preview"><img id="previewing" src="uploads/profileimages/ronin.png" class="rounded-circle img-fluid z-depth-2"style="height:100px !important;width:100px !important;" /></div>
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
            <input type="hidden" accept="image/*" id="image" name="image" value="uploads/profileimages/1541333686roninbg.png">
         </div>
         
        
        <div class="file-path-wrapper">
           <input class="file-path validate" id="ptt" type="text" placeholder="Upload Business Logo" readonly="readonly">
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
<input id="jlat" name="jlat" type="hidden" value="<?php echo $_SESSION["latitude"];?>">
<input  id="jlong" name="jlong" type="hidden" value="<?php echo $_SESSION["longitude"];?>">



    <div class="">
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
                            <input type="text" id="pac-input" name="pac-input" placeholder="Enter your address" class="form-control">
                        </div>

                     <!--Google map-->
<div id="admap" class="z-depth-0" style="height:320px"></div>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->
            



<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script> 



<input id="jlat" name="jlat" type="hidden" value="<?php echo $_SESSION["latitude"];?>">
<input  id="jlong" name="jlong" type="hidden" value="<?php echo $_SESSION["longitude"];?>">
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

</div>


       
                    <div class="" id="imagev" style="color:red;"> </div>                    
                    
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
            <button class="btn btn-secondary btn-rounded  " id="contreg" name="contreg" staff="width:50%;">
            <i class="fa fa-check" aria-hidden="true"></i>&nbsp;
             REGISTER </button> 
            </center>
            <div class="status"></div>
        </div>
        <!--Grid column-->
        
        <script>
          $("#contreg").click(function() { 
              
        var cname = $("#cname").val();
        var cno = $("#cno").val();
        var email = $("#email").val();
        var p1 = $("#p1").val();
        var p2 = $("#p2").val();
        var add = $("#add").val();
        var zip = $("#zip").val();
        var industry = $("#industryselect").val();
            var country = $("#countryselect").val();
            var city = $("#selectcity").val();
        var image = $("#image").val();
        var password = $("#password").val();
        var passwordc = $("#passwordc").val();
        var about = $("#about").val();
         var jlat = $("#jlat").val();
            var jlong = $("#jlong").val();
            
        
        
if(cname === "" || cname === null){

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
 Command: toastr["error"]("please enter the contractor name to continue", "NO CONTRATOR NAME!") ;
 $("#cname").toggleClass("invalid"); 


}
else if(industry === "" || industry === null){

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
 Command: toastr["error"]("please select an industry to continue", "NO INDUSTRY !") ;

}
else if(email === "" || email === null){

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
 Command: toastr["error"]("please enter the contractor email to continue", "NO EMAIL !") ;
 $("#email").toggleClass("invalid"); 

}
else if(p1 === "" && p2 === ""){
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
 Command: toastr["error"]("please enter at least one phone number to continue", "NO PHONE NUMBER!") ;
 $("#p1").toggleClass("invalid"); 
  $("#p2").toggleClass("invalid");

}
else if(add === "" || add === null){

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
 Command: toastr["error"]("please enter contractor address to continue", "NO ADDRESS!") ;
 $("#add").toggleClass("invalid"); 


}
else if(zip === "" || zip === null){

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
 Command: toastr["error"]("please enter zip/postal code to continue", "NO ZIP/POSTAL CODE!") ;
 $("#zip").toggleClass("invalid"); 

}
else if(about === "" || about === null){

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
 Command: toastr["error"]("please fill the about section to continue", "NO DESCRIPTION GIVEN!") ;
 $("#about").addClass("border border-danger");
  $("#zip").removeClass("invalid"); 


}
else if(country === "" || country === null){

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
 Command: toastr["error"]("please select your country to continue ", "NO COUNTRY!") ;
 $("#country").toggleClass("invalid");
 $("#about").removeClass("border border-danger");

}
else if(country !== "1" && country !== "2"){

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
 Command: toastr["error"]("Sorry, your country - "+country+", is out of our operation scope ", "COUNTRY NOT SUPPORTED!") ;
 $("#country").toggleClass("invalid");

}
else if(city === "" || city === null){

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
  Command: toastr["error"]("kindly select your city to continue", "NO CITY!") ;
 $("#city").toggleClass("invalid"); 

}
else if(image === "" || image === null){

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
 Command: toastr["error"]("please upload contractor logo or image to continue", "NO LOGO/IMAGE !") ;
 $("#image").toggleClass("invalid"); 

}else if(jlat === "" || jlat === null || jlong === "" || jlong === null ){ 
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
 Command: toastr["error"]("please move the red pin in the map to your locatiob", "INDICATE YOUR LOCATION") ;
 $("#map-container-3").addClass("border border-danger"); 
}
else if(password === "" || password === null){

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
 Command: toastr["error"]("please set a password to continue", "NO PASSWORD !") ;
 $("#password").toggleClass("invalid"); 
 $("#map-container-3").removeClass("border border-danger"); 

}
else if(password.length < 6){

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
 Command: toastr["error"]("password should be at least six characters ", "PASSWORD TOO SHORT !") ;
 $("#password").toggleClass("invalid");
 $("#map-container-3").removeClass("border border-danger");  

}
else if(passwordc === "" || passwordc === null){

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
 Command: toastr["error"]("please enter password confirmation to continue", "CONFIRM PASSWORD !") ;
 $("#passwordc").toggleClass("invalid"); 
 $("#map-container-3").removeClass("border border-danger"); 

}
else if(password !== passwordc){


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
 Command: toastr["error"]("please confirm password correctly", "PASSWORD AND CONFIRMATION DONT MATCH !") ;
 $("#password").toggleClass("invalid"); 
  $("#passwordc").toggleClass("invalid"); 
  $("#map-container-3").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger");
}else{
$("#fsub").click();
$("#map-container-3").removeClass("border border-danger"); 
}
       });
    </script>

    </div>

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
                <p><?php echo $nm;?> , Welcome to RONIN,<br />
                Its a pleasure having you here ,we will work together to ensure our clients get the best staff and our staff get the best clients ,  we look forward to your parcipation and cooperation.
                <br />
                Your Contractor Id is <span class="font-weight-bold" style="color:<?php echo $tt; ?> !important;"><?php echo $cidd; ?></span>
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
                
    