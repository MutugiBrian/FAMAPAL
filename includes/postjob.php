 <?php 
 error_reporting(0);
ini_set("display_errors", 0);
include 'common.php';
 if(isset($_POST['jpost'])){
$jname = $_POST['jname']; 
$jdesc = $_POST['jdesc']; 
$vacs = $_POST['vacs']; 

 if(isset($_COOKIE['reallat'])){
    $jlat = $_COOKIE['reallat']; 
    $jlong = $_COOKIE['reallong']; 
  }else{
$jlat = $_POST['jlat']; 
$jlong = $_POST['jlong'];
}

$jloc = $_POST['jloc'];
$industry = $_POST['industryselect'];
$skillsarray = $_POST['skillselect'];
$skills = serialize($skillsarray);
$jpay = $_POST['jpay'];
$jcurrency = $_POST['jcur'];
$payperiod = $_POST['payperiod'];
$jloc = $_POST['jloc'];
//list($jcity, $country) = $jlocarray;
$whole = $jloc;
$unique = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
list($jcity, $country) = explode(",", $whole, 2);
$uid = $_SESSION['id'];
$jpost = "INSERT INTO `jobs` (`id`, `uniquestr`, `name`, `title`, `description`, `pay_amount`,`pay_per`, `pay_currency`, `invoicecycle`, `vacancies`, `duration`,  `industry`, `skills`, `job_lat`, `job_long`, `city`, `country`, `posted_by`, `verified`, `edit_date`, `post_date`) VALUES (NULL, '$unique','$jname','', '$jdesc', '$jpay','$payperiod', '$jcurrency', '', '$vacs', '', '$industry', '$skills', '$jlat', '$jlong', '$jcity', '$country', '$uid', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$jparray = $conn->query($jpost);
if ($jparray === TRUE) {
$jid = mysql_insert_id();

foreach ($skillsarray as $skill) {
$skillreg = "INSERT INTO `job_skills` (`id`, `jobstr`, `client_id`, `skill_id`, `datecreated`, `dateupdated`) VALUES (NULL, '$unique', '$uid', '$skill', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$skarray = $conn->query($skillreg);
}

/*foreach ($contsarray as $cont) {
$contreg = "INSERT INTO `job_contractors` (`jobcont_id`, `jobstr`, `client_id`, `contractor_id`, `datecreated`, `dateupdated`) VALUES (NULL, '$unique', '$uid', '$cont', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$coarray = $conn->query($contreg);


$notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`,`jobstr`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'newjobposted', '$uid', '$cont', '$unique', 'Has opened a job for you', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);
}*/

//MESSAGE EMPLOYEES IN INDUSTRY ON THE NEW JOB
$empq = "SELECT * FROM `users` WHERE type = 2 AND industry = $industry";
$emparray = $conn->query($empq);
if ($emparray->num_rows > 0){while($row = $emparray->fetch_array()){
    $name = $row['fname']; 
    $sid = $row['id'];   
    $uid = $_SESSION['id'];
    if($row['p1'] == ''){
    $phone = $row['p2']; 
    }else{
    $phone = $row['p1']; 
    }   
    
    $message = "Hey ".$name.",".$_SESSION['username']."just posted a ".$jname." job at ".$jloc." .Please check it out and apply.";
    sendmessage($phone,$message);


    //IN-APP NOTIFICATION
    $notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`,`jobstr`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'newjobposted', '$uid', '$sid', '$unique', 'Has posted a $jname job', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);
   //IN-APP NOTIFICATION ENDS

}}
//MESSAGE EMPLOYEE ENDS HERE

        $jp= 1;
        $np = 0;
}else{ 
        $jp= 0;
        $np = 1;
}
 
 
 }
$uid = $_SESSION['id']; 
$tm = time();
$pj = "UPDATE `users` SET `lspj` = '$tm' WHERE `users`.`id` = $uid";
$pjk = $conn->query($pj);
 ?>
<section class="form-gradient pgs">

    <!--Form with header-->
    <div class="card wow fadeInUp py-0 px-0">

        <!--Header-->
        
        <!--Header-->

        <div class="card-body mx-0 mt-0 py-0 px-0">
 
 <?php  if($jp == 1){?>

 <script>
            $(document).ready(function() {
             
             $("#pjform").find("input[type=text],input[type=tel],input[type=file],input[type=email],input[type=password], textarea").val("");
            
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
 Command: toastr["success"]("check progress in posted jobs section", "JOB POSTED SUCCESSFULLY") ; 
$(location).attr("href","?page=openjobs");                                    
            });
            </script>
<?php } ?>
<?php  if($np == 1){?>
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
          

 <section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="margin-top: 0px !important;padding-top: 0px !important;border:2px solid <?php echo $tt; ?>;">

    <!--Section heading--> 
    
    <div class="py-0 nd"style="margin-bottom: 0px !important;" >
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2 font-weight-bold" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    posting crop
    </span>
    </h4>

     
    </div>
    <script>
function goBack() {
    window.history.back();
}
</script>

    <div style="" class=" mx-0 my-0">
    <div class="align-middle wow fadeInUp py-2 px-3 mx-0 my-0 d-none errordiv" id="regt">
      <span class="text-left text-center align-middle mt-1 mr-2 white-text text-white"><i class="fas fa-exclamation-triangle" style=""></i>
        <span id="regerror">FILL ALL DETAILS</span></span>
    </div> 

    <!--Card content-->
    <div class="card-body px-lg-5 "  style="border-width:2px !important;background-color:#FFFFFF !important;">

        <!-- Form -->
        <form class="text-center" method="POST" id="pjform" action="#" style="color: #757575;">

            <!-- Name -->
            <div class="md-form mt-3">
                  <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Crop Name</label>
    <textarea class="form-control z-depth-1  ta" id="jname" name="jname" length="30"  maxlength="30" rows="3" placeholder="Enter crop name here..."></textarea>
</div>
            </div>
            
              <!-- Name -->
            <!-- <div class="md-form mt-3">
                  <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Job Title</label>
    <textarea class="form-control z-depth-1  ta" id="jtitle" name="jtitle" length="30"  maxlength="30" rows="3" placeholder="Enter job title here..."></textarea>
</div>
            </div> -->
            
            
             
            <div class="md-form ">
                <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Crop Description</label>
    <textarea class="form-control z-depth-1 ta" name="jdesc" id="jdesc" length="200"  maxlength="200" rows="3" placeholder="Describe your crop here..."></textarea>
</div>
            </div>
            
            
 <div class="md-form ">
 <!-- Default column sizing form -->
    <!-- Grid row -->
    <div class="form-row mx-1">
        <!-- Grid column -->
        <div class="col-4">
             <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">PRICE</label>
    <textarea class="form-control z-depth-1 ta" id="jpay" name="jpay" length="30"  maxlength="30" rows="1" placeholder="0" onkeyup="checkInput(this)"></textarea>
</div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
    <div class="col-3">
    <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">CURRENCY</label>
    <textarea class="form-control z-depth-1 border border-secondary font-weight-bold text-secondary text-center ta " id="jcur" name="jcur" length="6"  maxlength="6" rows="1" value="Kshs" readonly style="border-color: <?php echo $tt; ?> !important;color: <?php echo $tt; ?> !important;">
    Kshs</textarea>
    </div>
    </div>
 PER
   
    
    <div class="col">
   
       <div class="form-group shadow-textarea ">
     <select class="mdb-select colorful-select dropdown-secondary" id="payperiod" name="payperiod">
      <?php 
    
    $industries = "SELECT * FROM pay_periods";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iname; ?>" <?php
       if($iid == 1){
        echo "selected";
       }
       ?>><?php echo $iname; ?></option>
    <?php
    }}else{
    
    echo "
     <option value='0' disabled selected>completion</option>
    ";
    }  
    ?>
</select>

    </div>
    
    </div>
    
    </div>
    
  
    
    
   
                        
                        
                        
                            
    <div class="form-row">
    
    <div class="col-12">
     <div class="md-form">
                            <input type="number" id="vacs" name="vacs" class="form-control">
                            <label for="password" class="">QUANTITY(kgs).</label>
                        </div>
    </div>
    
  
    
     
    </div>
    
    
    
    
   
    <script>
 function checkInput(ob) {
  var invalidChars = /[^0-9]/gi
  if(invalidChars.test(ob.value)) {
            ob.value = ob.value.replace(invalidChars,"");
                toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 300,
  "timeOut": 1000,
  "extendedTimeOut": 300,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("", "NUMBERS ONLY FOR THIS FIELD !") ;
            
            
      }
}
    </script>
    <!-- Grid row -->
<!-- Default column sizing form -->
</div>
               <!-- E-mai -->
            <div class="md-form">
                   <div class="">
                <select class="mdb-select colorful-select dropdown-secondary" id="industryselect" name="industryselect">
                <option value="" disabled >Choose Crop Type</option>
      <?php 
    
    $industries = "SELECT * FROM industries";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iid;?>" <?php if($iid == $_SESSION['industry']){ echo "selected";} ?>><?php echo $iname;?></option>
    <?php
    }}else{
    
    echo "no crop types set";
    }  
    ?>
</select>
</div>
            </div>


            <div class="md-form">
  <input placeholder="Select maturity date" type="text" id="date-picker-example" class="form-control datepicker">
  <label for="date-picker-example">maturity date</label>
</div>
            
           <script>   
            $(document).ready(function() {
            $("#contfilter").change(function() {
            
            
            
            
             fff = this.value;
             
             ind = $("#industryselect").val();

     

 $("#contselect").load("ajax/filtercontractors.php?f="+fff+"&i="+ind);
 wto = setTimeout(function() {
  
   $("#contselect").material_select("destroy");   
$("#contselect").load("ajax/filtercontractors.php?f="+fff+"&i="+ind);
$("#contselect").material_select();
$("#contselect").load("ajax/filtercontractors.php?f="+fff+"&i="+ind);
    
}, 500);
            
           
            }); 
            });
           </script>
          
            
            
            <div class="md-form" id="mdp-demo">

</div>
                            
            <script>
           $('#mdp-demo').multiDatesPicker();
            </script>

         
            
            <div class="md-form <?php if(isset($_COOKIE['reallat'])){echo 'd-none';}?>" style="margin-top:50px !important;">
            
               <!--Card-->
    <div class="card card-cascade narrower">

      <!--Card image-->
      <div class="view view-cascade gradient-card-header blue-gradient mb-0" style="height:auto !important;">
        <h5 class="mb-0">Set crop Location</h5>
      </div>
      <!--/Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center mt-0 pt-0 ">

                     <!--Google map-->
<div id="map-container-3" class="z-depth-0" style="height: 300px"></div>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->
            



<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script> 

<?php 

if(isset($_COOKIE['reallong'])){
    $vl = $_COOKIE['reallat'].",".$_COOKIE['reallong']; 
  }else{
    $vl = $_SESSION['homelatlong'];
    }

    echo'  
<script>
function custom_map() {

var var_location = new google.maps.LatLng('.$vl.');

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
"visibility": "off"
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
"visibility": "off"
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

  ';
$myid = $_SESSION['id'];
$ev = "SELECT * FROM users WHERE id = $myid";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){

   if(isset($_COOKIE['reallat'])){
    $lat = $_COOKIE['reallat']; 
    $long = $_COOKIE['reallong']; 
  }else{
$lat = $dets['reg_lat'];
$long = $dets['reg_long'];
}

echo' 
var marker = new google.maps.Marker({
    position: new google.maps.LatLng('.$lat.','.$long.'),
    map: var_map,   
    label: {
    color : "green",
    fontWeight: "bold",
    text: "Move this pin to crop location"
    },       
    draggable:true,
    title:"Drag me!"
});  
function handleEvent(event) {
   var lat = event.latLng.lat();
   var lng = event.latLng.lng();
   $("#jlong").val(lng);
   $("#jlat").val(lat);
   $.post("ajax/getloc.php?lat="+lat+"&lng="+lng+"&page="+"postjob", function(data) {
     $("#jloc").load(data);
   $("#jloc").val(data);
   });
  
}
marker.addListener("drag", handleEvent);    
';
}}
echo' }


google.maps.event.addDomListener(window, "load", custom_map);




$.post("ajax/getloc.php?lat="+lat+"&lng="+lng+"&page="+"postjob", function(data) {
     $("#jloc").load(data);
   $("#jloc").val(data);
   });
            


</script>';





  if(isset($_COOKIE['reallat'])){
    $lat = $_COOKIE['reallat']; 
    $long = $_COOKIE['reallong']; 
  }else{
$lat = $dets['reg_lat'];
$long = $dets['reg_long'];
}

?>  
<script type="text/javascript">
  $.post("ajax/getloc.php?lat=<?php echo $lat;?>&lng=<?php echo $long;?>&page="+"postjob", function(data) {
     $("#jloc").load(data);
   $("#jloc").val(data);
   });
</script> 
<input id="jlat" name="jlat"  value="<?php echo $lat; ?>"type="hidden">
<input  id="jlong" name="jlong" value="<?php echo $long; ?>"type="hidden">
            
            
            </div>
            
             <div class="md-form ">
                
                
                   <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Location - <?php if(isset($_COOKIE['reallat'])){ ?> <span style="color:red;font-weight: bold;">USES CURRENT LOCATION </span>
      <?php } ?></label>
    <textarea class="form-control z-depth-1 border border-secondary text-secondary font-weight-bold" id="jloc"  name="jloc"  maxlength="6" rows="1" value="<?php echo $city.','.$country; ?>" readonly>
    <?php echo $city.','.$country;?>
    </textarea>
</div>
            </div>


            
           
            
            
            
            

            <!-- Sign in button -->
           <button type="submit" name="jpost" id="jpost" class="d-none">D POST</button>

        </form>

            <center>
        <button class="btn btn-rounded   btn-block z-depth-0 my-4 waves-effect font-weight-bold"id="pj" name="pj" style="width:50% !important;background-color: <?php echo $tt; ?>;" ><i class="fa fa-check" aria-hidden="true"></i>&nbsp;POST CROP</button>
        </center> 
      

    </div>

</div>
</section>
</div>
</div>
</section>


<script>
$("#pj").click(function (){

var jname = $("#jname").val();
var jtitle = $("#jtitle").val();
var jdesc = $("#jdesc").val();
var jlat = $("#jlat").val();
var jlong = $("#jlong").val();
var jloc = $("#jloc").val();
var industry = $("#industryselect").val();
var ic = $("#ic").val();
var vacs = $("#vacs").val();
var duration = $("#duration").val();
var pp = $("#payperiod").val();
var skills = $("#skillselect selected").val();
var jpay = $("#jpay").val();
var jcur = $("#jcur").val();
var conts = $("#contselect").val();




     function ed(){
          $(".ta").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger"); 
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");

   $("#industryselect").removeClass("invalid"); 
  $("#regt").addClass("d-block");

         }

if(jname === "" || jname === null){

 ed();
 $("#regerror").text("input crop name to continue"); 
 $("#jname").addClass("border border-danger");

}else if(jdesc === "" || jdesc === null){

 ed();
 $("#regerror").text("input crop description to continue"); 
 $("#jdesc").addClass("border border-danger");



}
else if(jpay === "" || jpay === null || jpay === 0){

ed();
 $("#regerror").text("input crop price to continue"); 
 $("#jpay").addClass("border border-danger");


}
else if(jcur === "" || jcur === null){

 ed();
 $("#regerror").text("no currency found"); 
 $("#jcur").addClass("border border-danger");   


}else if(vacs === "" || vacs === null){

 ed();
 $("#regerror").text("enter quantity to continue"); 
  $("#vacs").addClass("invalid");


}else if(industry === "" || industry === null){

ed();
 $("#regerror").text("select crop type to continue");  
  $("#industryselect").addClass("invalid");

}
else if(skills === "" || skills === null || skills === 0 ){
ed();
 $("#regerror").text("select skills to continue"); 
  $("#skillselect").addClass("invalid");


}else if(jlat === "" || jlat  === null || jlong === "" || jlong  === null){

 ed();
 $("#regerror").text("move pin to set job location"); 
 $("#map-container-3").addClass("border border-danger");

}else if(jloc === "" || jloc === null){
ed();
 $("#regerror").text("error getting job location"); 
 $("#map-container-3").addClass("border border-danger");


}else{   
  $("#jcur").removeClass("border border-danger");   
  $("#jpay").removeClass("border border-danger"); 
 $("#jname").removeClass("border border-danger");
  $("#jdesc").removeClass("border border-danger");
 $(".form-control").removeClass("invalid");
 $("#map-container-3").removeClass("border border-danger");
$("#jpost").click();
}

});
</script>

<!-- Material form subscription -->
</div>
</div>