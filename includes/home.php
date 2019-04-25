
<?php 
error_reporting(0);
ini_set('display_errors',0);
include 'includes/common.php';   
?>
<style type="text/css">
  .border-secondary{
    border:2px solid <?php echo $tt; ?> !important;
  }
</style>




<?php

$qd  = ""; 
$wd="";
$ps="";  
if(isset($_SESSION['id'])){
$dp = $_SESSION['ni'];
}

if(isset($_POST['qsub'])){

$jobid = $_POST['jobid'];
$empid =  $_POST['empid'];
$myid = $_SESSION['id'];

 $hquery = "INSERT INTO `queue` (`employee`, `employer`, `datecreated`, `id`) VALUES ($myid, $empid, CURRENT_TIMESTAMP, NULL)";
 $harray = $conn->query($hquery);
 if(!$harray){
  /*echo 0;*/
  ?>
 <script type="text/javascript">
  

  </script>
  <?php
 }else{
$qd = 1;


//END OF SMS
  ?>
  <script type="text/javascript">
   toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 200,
  "hideDuration": 1000,
  "timeOut": 1000,
  "extendedTimeOut": 500,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
  Command: toastr["success"]("queued successfully")
  </script>
  <?php
 }
}

if(isset($_POST['hsub'])){

$jobid = $_POST['jobid'];
$empid =  $_POST['empid'];
$myid = $_SESSION['id'];

 $hquery = "INSERT INTO `hired` (`jobid`, `employeeid`,`employerid`, `completed`, `hiredate`) VALUES ( $jobid, $empid,$myid,'', CURRENT_TIMESTAMP)";
 $harray = $conn->query($hquery);
 if(!$harray){
  /*echo 0;*/
  ?>
 <script type="text/javascript">
 	/*alert("<?php echo $hquery; ?>");*/
  </script>
  <?php
 }else{



$ev = "SELECT u.* ,j.name AS jn FROM users u,jobs j WHERE u.id = $empid and j.id = $jobid";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
$no = $dets['p1'];
$nm = $dets['fname'];
$jn = $dets['jn'];
$img = $dets['image'];

$to = "+254".$no;

$sms = 'Hallo '.strtoupper($nm).' , we have good news, you just got hired by '.strtoupper($_SESSION['username']).' at FAMAPAL for a '.strtoupper($jn).' JOB ! open the app and proceed to work.';


sendmessage($to,$sms);
}}


//END OF SMS
  ?>
  <script type="text/javascript">
    window.location='?page=hire&jid=<?php echo $jobid;?>';
  </script>
  <?php
 }
}

 if(isset($_POST['skillsub']) && $dp == 1){
$s1 = $_POST['skill1'];
$s2 = $_POST['skill2'];
$s3 = $_POST['skill3'];
$s4 = $_POST['skill4'];
$s5 = $_POST['skill5'];
$iid = $_SESSION['industry'];
$id = $_SESSION['id'];
if( $s1==""||$s2==""||$s3==""||$s4==""||$s5==""){
$wd=1;
}else{
$skill1reg = "INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) 
VALUES ('$s1', '$iid', '0', NULL, '$id', CURRENT_TIMESTAMP)";
$skillarray = $conn->query($skill1reg );
if ($skillarray === TRUE) {
$_SESSION["ni"]="";
}else{}

$skill1reg = "INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) 
VALUES ('$s2', '$iid', '0', NULL, '$id', CURRENT_TIMESTAMP)";
$skillarray = $conn->query($skill1reg );
if ($skillarray === TRUE) {
$_SESSION["ni"]="";
}else{}

$skill1reg = "INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) 
VALUES ('$s3', '$iid', '0', NULL, '$id', CURRENT_TIMESTAMP)";
$skillarray = $conn->query($skill1reg );
if ($skillarray === TRUE) {
$_SESSION["ni"]="";
}else{}

$skill1reg = "INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) 
VALUES ('$s4', '$iid', '0', NULL, '$id', CURRENT_TIMESTAMP)";
$skillarray = $conn->query($skill1reg );
if ($skillarray === TRUE) {
$_SESSION["ni"]="";
}else{}

$skill1reg = "INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) 
VALUES ('$s5', '$iid', '0', NULL, '$id', CURRENT_TIMESTAMP)";
$skillarray = $conn->query($skill1reg );
if ($skillarray === TRUE) {
$_SESSION["ni"]="";
}else{}

$ps=1;
}





}
?>


<?php  if($ps == 1){ ?>
<script>
 $(document).ready(function() {
              
             toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
   "positionClass": "md-toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 1000,
  "hideDuration": 2000,
  "timeOut": 2000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["success"]("Thank you for making FAMAPAL better", "SKILLS ADDED SUCCESSFULLY") ;                                     
            
            
});
</script> 
<?php } ?> 





<?php 
 if(isset($_SESSION['id'])){
  $jl = $_SESSION['jl'];

 if($jl == 1){ ?>
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
  "hideDuration": 2000,
  "timeOut": 4000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["success"]("Welcome", "LOGGED IN SUCCESSFULLY") ;                                     
            
            
});
</script> 
<?php 
$_SESSION['jl'] = "";

}} ?> 


<?php
 if(@$_SESSION["ni"]==1){
 
 if(@$SESSION['utype'] == "2" || @$SESSION['utype'] == 2){
 ?>

 <script>
            $(document).ready(function() {                                                                                   
            $('#nismodal').modal('toggle');
            });
            </script>

<?php
}else{
?>


<script>
            $(document).ready(function() {                                                                                   
            $('#nicmodal').modal('toggle');
            });
            </script>



<?php
}
}?>

 
 
 
 <?php if(@$_SESSION["id"]>0){ ?> 
 




 <?php if($qd == 1){ ?>
<script type="text/javascript">
 $(document).ready(function() {
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 400,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1500,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
  Command: toastr["success"]("queued successfully");
});
</script>
<?php 
$qd = "";
} ?>
      
 
 
 
 
 <!--Google map-->
<div id="map-container-3" class="z-depth-0 border" style="border-width:2px !important;height: 610px;border:2px solid <?php echo $tt; ?> !important;margin-top: 0px !important;padding-top: 0px !important;""></div>

<?php 

if(isset($_COOKIE['reallong'])){
    $vl = $_COOKIE['reallat'].",".$_COOKIE['reallong']; 
  }else{
    $vl = $_SESSION['homelatlong'];
    }

?>
<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script> 
<?php echo'  
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

var iconmain = {
    url: "'.$_SESSION['image'].'", 
    label: "YOU",
    scaledSize: new google.maps.Size(50, 50), 
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 0) 
};

var var_marker = new google.maps.Marker({
position: var_location,
map: var_map,
label: {
    color: "red",
    fontWeight: "bold",
    text: "YOU",
  },
icon: iconmain,
title: "You are here"
});
';
$myid = $_SESSION["id"];
$ev = "SELECT h.* , j.* FROM hired h, jobs j WHERE h.employeeid = $myid AND h.completed = 0 AND j.active = 0 AND j.id = h.jobid";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
$lat = $dets['job_lat'];
$long = $dets['job_long'];
echo '


var var_marker = new google.maps.Marker({
position: new google.maps.LatLng('.$lat.','.$long.'),
map: var_map,
label: {
    color: "red",
    fontWeight: "bold",
    text: "'.$dets['name'].' - CHECK IN",
  },
icon: {
url : "./uploads/bd.png",
 scaledSize: new google.maps.Size(40, 40), 
    labelOrigin: new google.maps.Point(11, 50),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 0) 
	},
title: "open job - move here to check in"
});



  ';

  }}
$myid = $_SESSION['id'];
if($_SESSION['ut'] == 1 ){
	$ft = 2;
	$fn = 'hire';
	$fs = 'create job to hire';


  $ev = "SELECT * FROM users WHERE id != $myid AND type = $ft AND users.id NOT IN (SELECT employeeid FROM hired WHERE employerid = $myid AND completed = 0)";

	}else{

    $ft = 1;
	$fn = 'queue';


	$fs = 'queue for jobs';

  $ev = "SELECT * FROM users WHERE id != $myid AND type = $ft ";

	}
$myid= $_SESSION['id'];
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
$lat = $dets['reg_lat'];
$long = $dets['reg_long'];
$img = $dets['image'];
if($img == ''){
	$img = './uploads/sidelogo.png';
}
$tu = $dets['id'];

if($_SESSION['ut'] == 2){
$an = $dets['bname'];
  }else{
$an = $dets['fname'];
}
$ar = $dets['rating'];

if($_SESSION['ut'] == 2){
  $ev2 = "SELECT * FROM queue WHERE employee = $myid AND employer = $tu AND deleted = 0";
$evarray2 = $conn->query($ev2);
if ($evarray2->num_rows > 0) {
  $ic = 'green';
  }else{
$ic = 'red';
  }


}


echo' 

var icon = {
    url: "'.$img.'", 
    scaledSize: new google.maps.Size(50, 50), 
    labelOrigin: new google.maps.Point(11, 50),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 0) 
};

var var_marker'.$tu.' = new google.maps.Marker({
position: new google.maps.LatLng('.$lat.','.$long.'),

map: var_map,';
?>
label: {
    color : 'green',
    fontWeight: 'normal',
    <?php 

    if($_SESSION['ut'] == 2){

  if($ic == 'green'){
   

    }else{
 echo "text: '".$fn."'";
     }

    }else{
 echo "text: '".$fn."'";
    }

    ?>
   
  },

<?php

if($_SESSION['ut'] == 2){

  if($ic == 'green'){
    $fs = "queued";

  echo 'icon: {                             
  url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"    
                       },';

    }else{
echo 'icon: "",';
    }

    }else{
      echo 'icon: "",';
    }
  echo '
  ';?>
  

 labelContent: "<i class='fa fa-hard-hat fa-3x' style='color:rgba(153,102,102,0.8);'></i>",

 <?php echo '
title: "'.$fs.'"
});';


if($_SESSION['ut'] == 2){

  if($ic == 'green'){
    $fs = "queued";

  echo 'google.maps.event.addListener(var_marker'.$tu.', "click", function() {oq()});';

    }else{
echo 'google.maps.event.addListener(var_marker'.$tu.', "click", function() {mapmodal("'.$an.'","'.$tu.'","'.$img.'","'.$ar.'")});
';
    }

    }else{
      echo 'google.maps.event.addListener(var_marker'.$tu.', "click", function() {mapmodal("'.$an.'","'.$tu.'","'.$img.'","'.$ar.'")});
';
    }

}}
echo' }
google.maps.event.addDomListener(window, "load", custom_map); 



function oq(){



toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 200,
  "hideDuration": 1000,
  "timeOut": 1000,
  "extendedTimeOut": 500,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
  Command: toastr["error"]("Already queued")
}

function mapmodal(name,empid,image,rating){
	$("#regt").removeClass("d-block");
	$("#regt").addClass("d-none");
document.cookie="cr="+rating; 
$("#mi").attr("src",image);
$("#mn").html(name);
$("#empid").val(empid);
$("#modalLoginAvatar").modal();
} 
</script>
<!--Modal: Login with Avatar Form-->
<div class="modal fade " id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true"">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document" style="margin-top:150px !important;margin-right:50px !important;margin-left:50px !important;"  >
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="./uploads/sidelogo.png" height="150px" width="60px"alt="avatar" id="mi" class="rounded-circle img-responsive" style="height:100px !important;width:100px !important;">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">
         
        <h5 class=" mb-1" id="mn">EMPLOYEE</h5>
        <h6 id="rs"> </h6>';
        showrating($_COOKIE['cr']);




?>
<div class="align-middle wow fadeInUp py-2 px-3 mx-0 my-0 col-12 d-none" id="regt" style="background-color:#ff6961;">
      <span class="text-left text-center align-middle mt-1 mr-2 white-text text-white" ><i class="fas fa-exclamation-triangle" style="color:white !important;"></i>
        <span id="regerror">FILL ALL DETAILS</span></span>
    </div>

  <?php if($_SESSION['ut'] == 1){ ?>
<form action="" method="POST" id="mh" name="mh"> 
<div class="col">
<input type="hidden" id="empid" name="empid" />	
       <div class="form-group shadow-textarea ">
     <select class="mdb-select colorful-select dropdown-secondary" id="jobid" name="jobid">
      <?php 
    $me = $_SESSION['id'];
    $industries = "SELECT * FROM `jobs` WHERE posted_by = $me AND completed = 0";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) { ?>

<option value='' disabled selected>select job to hire</option>
    	<?php while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 

       <option value="<?php echo $iid; ?>" ><?php echo $iname; ?></option>
    <?php
    }}else{
   
    echo "
     <option value='0' disabled selected>create job to hire</option>
    ";
    }  
    ?>
</select>

    </div>
     
    </div>
<?php
echo'

        <button type="submit" name="hsub" id="hsub" class="d-none" >SUBMITT</button>  
        </form>



        <div class="text-center mt-4">
          <button name="maph" id="maph" class="btn mt-1 btn-outline-secondary" style="border-color:'.$tt.' !important;color:'.$tt.' !important;">HIRE  &nbsp;<i class="fas fa-hard-hat tt " style="font-size:17px;"></i></button>
        </div>';
        ?>


 <script type="text/javascript">
      $("#maph").click(function (){


           function ed(){
          $(".db").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger"); 
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");
  $("#regt").addClass("d-block");
   }

        var j = $("#jobid").val();
        if(j === '' || j === null){
          ed();
           $("#regerror").text("select job first"); 
        }else{
          $("#hsub").click();  
        }
      });
     </script>


  <?php }else{ ?>




    <form action="" method="POST" id="mh" name="mh"> 
<div class="col">
<input type="hidden" id="empid" name="empid" /> 
<center>QUEUE FOR A JOB</center>
    </div>
<?php
echo'

        <button type="submit" name="qsub" id="qsub" class="d-none" >QUEUE</button>  
        </form>



        <div class="text-center mt-4">
          <button name="mapq" id="mapq" class="btn mt-1 btn-outline-secondary" style="border-color:'.$tt.' !important;color:'.$tt.' !important;">QUEUE NOW  &nbsp;<i class="fas fa-hard-hat tt " style="font-size:17px;"></i></button>
        </div>';
        ?>

         <script type="text/javascript">
      $("#mapq").click(function (){


           function ed(){
          $(".db").removeClass("border border-danger"); 
  $("#about").removeClass("border border-danger"); 
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");
  $("#regt").addClass("d-block");
   }

        var j = $("#jobid").val();
        if(j === '' || j === null){
          ed();
           $("#regerror").text("select job first"); 
        }else{
          $("#qsub").click();  
        }
      });
     </script>















  <?php } ?>

    


        <?php
      echo ' </div>

    </div>
    <!--/.Content-->
  </div>
</div>
';
?>   


<?php  if($wd == 1){?>
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


<?php
$ut = $_SESSION['utype'];
if($ut == 3){
 ?>               
<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary"  style="border-width: 2px !important;background-color:#EFF3F4 !important;"> 
<div class="col-lg-4  col-md-4 col-6 rgba-white-strong mx-auto z-depth-0  btn btn-outline-secondary border-0 view"  style="height:auto !important;padding:0px !important;">
<div class="card-header  info-text text-uppercase font-weight-bold " style="background-color:white !important;margin-top:0px !important;">JOBS FEED</div>  
</div> 
<div class="" style="padding:0px !important;background-color:#EFF3F4 !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important;background-color:#EFF3F4 !important; " id="accordionEx7" >


<?php

$cjid = $_SESSION['id'];

$ev = "SELECT j.*,jc.*,u.image,u.bname FROM jobs j,users u,job_contractors jc WHERE jc.contractor_id = $cjid AND u.id = j.posted_by AND j.uniquestr = jc.jobstr ORDER BY j.post_date DESC LIMIT 10";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
$i = 0;
while($j = $evarray->fetch_array()){
$myid = $j['posted_by'];
$image = $j['image'];
$client = $j['bname'];
$jid = $j['id'];
$nm = $j['name']; 
$i = $i+1;

$name = substr($nm,0,21).'';

?> 
<div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-2 my-2 py-auto" >

<div class="mr-3 mb-0" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse<?php echo $jid; ?>" aria-expanded="true" aria-controls="collapse<?php echo $jid; ?>">
<div class="row mr-1 my-1 pl-1"   >
<div class="col-4 pss align-middle py-auto">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $jid; ?>">
    </div>
<img class="rounded-circle img-fluid d-flex z-depth-0 squareimage my-auto" src="<?php echo $image; ?>" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $myid ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $jid; ?>").val(data);
$("#onlinej<?php echo $jid; ?>").html(data);
});   
}, 5000);
</script>
<div class="mb-o text-center text-secondary font-weight-bold" style="font-size:10px !important;">
<?php 
$sc = substr($client,0,18).'';
echo $sc;
?>
</div>
</div>
<div class="col-8 px-1">
<div class="row font-weight-bold" >
<i class="fa fa-briefcase text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $name; ?></div>
<div class="row" ><i class="fa fa-certificate text-secondary my-auto " style="margin-left:2px !important;"aria-hidden="true" ></i>&nbsp;<?php echo $j['title']; ?></div>
<div class="row ">&nbsp;<i class="fa fa-map-marker text-secondary my-auto" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $j['city'].",".$j['country']; ?></div>

<div class="row "><i class="fa fa-money text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $j['pay_amount']." ".$j['pay_currency']."/".$j['pay_per']; ?></div>
</div>
</div>
</div>


<div class="dropdown dropleft"  style="position:absolute;top:0px !important;right:0px !important;font-size:20px !important;">
<i class="fa fa-ellipsis-v " id="dell<?php echo $jid; ?>" aria-hidden="true" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="position:absolute;top:5px !important;right:5px !important;"></i>
     <div class="dropdown-menu dropdown-secondary" id="jdd<?php echo $jid; ?>">
    <a id="apply<?php echo $jid; ?>" class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Apply</a>
    <a class="dropdown-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;Share</a>
    <a class="dropdown-item" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;&nbsp;Favourite</a>
    
    <script>
    $("#apply<?php echo $jid; ?>").click(
     function (){
      window.location='?page=apply&jid=<?php echo $jid;?>&by=<?php echo $myid;?>';
      }
    );
    </script>
  </div>
</div>

<a type="button" id="applyb<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold px-0" style="position:absolute;bottom:0px !important;right:0px !important;font-size:10px !important;height:20px !important;width:70px !important;padding-top:3px !important;background-color: <?php echo $tt; ?>;">APPLY</a>

 <script>
    $("#applyb<?php echo $jid; ?>").click(
     function (){
      window.location='?page=apply&jid=<?php echo $jid;?>&by=<?php echo $myid;?>';
      }
    );
    </script>
                <div id="collapse<?php echo $jid; ?>" class="collapse mt-0 pt-0 <?php if($i == 1){echo "show";}?>" role="tabpanel" aria-labelledby="heading<?php echo $jid; ?>" data-parent="#accordionEx7">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold">Job Description</span><br />
                        <?php echo $j['description']; ?></p>
                    </div>
                </div>
                
</div> 
</div>
<script>
$("#dell<?php echo $jid; ?>").click(function (){
 $("#jdd<?php echo $jid; ?>").dropdown();
});
</script>



<?php }} ?>

               
</div>
</div>
</div> 
<?php } ?>


<?php
$ut = $_SESSION['utype'];
if($ut != 1){
 ?>      
 <!----open jobs start here--->



 <?php
$myid = $_SESSION['id'];
$ev = "SELECT h.*,j.*,u.*,j.id as jidd FROM hired h,jobs j,users u WHERE j.active = 0 AND h.employeeid = $myid AND h.completed = 0 AND j.id = h.jobid AND u.id = h.employerid";

$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {

	?>

<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary mb-3"  style="border-width: 2px !important; border:2px solid <?php echo $tt; ?> !important;"> 
<div class="nd"style="margin-bottom: 0px !important;border:none !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" ><i class="fas fa-hard-hat tt ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    OPEN JOBS
    </span>
    </h4>
    </div>
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important;" >





	<?php
while($dets = $evarray->fetch_array()){
  $nm = $dets['bname']; 
  $image = $dets['image']; 
  $pay = $dets['pay_amount']; 
  $per = $dets['pay_per']; 
  $curr = $dets['pay_currency']; 
  $jidd  = $dets['jidd'];
   $jn = $dets['name']; 
   $sd = $dets['startdate'];
   $ck = $dets['checkedin'];
$name = substr($nm,0,16).'..';
$rating = $dets['rating'];
$uid = $dets['id']; 


	$sdate = $dets['startdate'];
	$startdate = date('D M j Y', $sdate);
    $starttime = date('H:i', $sdate);
    $jfrom = $startdate." ".$starttime.":00 GMT+0300 (East Africa Time)";
?> 


 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $uid; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
echo $jn;
?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold text-secondary" id="" style="font-size:13px;color:red;"><?php echo $nm; ?>
</div>
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var jf = "<?php echo $jfrom; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date();


  var difference = now.getTime() - dateEntered.getTime();

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    	var payperiod = "<?php echo $per; ?>";
  var payamount = "<?php echo $pay; ?>";
  var paypeople = 1;
  var curr  = "<?php echo $curr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount<?php echo $jidd; ?>").text(tt+" "+curr);
  }
  else if(payperiod === 'MONTH'){

  	var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
  	var dd  = hh/24;
  	var mm = dd/30;
  var total = payamount*mm;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
  	var dd  = hh/24;
  	var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
  	var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
   	var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);

  }

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  
}
  </script>

</div>
<div class="col-2">

<?php if($ck == 1){?>
<a  data-toggle="tooltip" title="checked in!"  class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="jc<?php echo $jidd; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
<?php }else{ ?>

  <a   data-toggle="tooltip" title="not checked in!"  class="btn-floating btn-sm btn-danger z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="jc<?php echo $jidd; ?>"><i class="far fa-clock" aria-hidden="true"></i></a>


<?php } ?>
</div>
</div>
</div>

<script>
    $("#jc<?php echo $jidd; ?>").click(
     function (){

      window.location='?page=hire&jid=<?php echo $jidd;?>';
      }
    );
    </script>


                <div id="collapse<?php echo $id; ?>" class="collapse mt-0 pt-0" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>" data-parent="#propose">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold">SKILLS</span><br />
                        <?php echo $fname; ?></p>
                    </div>
                </div>
                
</div> 
</div>
<script>
$("#dell<?php echo $id; ?>").click(function (){
 $("#jdd<?php echo $id; ?>").dropdown();
});
</script>






<?php
}
?>

</div>
</div>
</div> 


<?php
}
	?>

          


<?php
$myid = $_SESSION['id'];
$ev = "SELECT h.*,j.*,u.*,j.id as jidd FROM hired h,jobs j,users u WHERE j.active = 1 AND h.employeeid = $myid AND h.completed = 0 AND j.id = h.jobid AND u.id = h.employerid AND h.checkedin = 1";

$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {

	?>

<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary mb-3"  style="border-width: 2px !important; border:2px solid <?php echo $tt; ?> !important;"> 
<div class="nd"style="margin-bottom: 0px !important;border:none !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" ><i class="fas fa-hard-hat tt ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    ACTIVE JOBS
    </span>
    </h4>
    </div>
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >





	<?php
while($dets = $evarray->fetch_array()){
  $nm = $dets['bname']; 
  $image = $dets['image']; 
  $pay = $dets['pay_amount']; 
  $per = $dets['pay_per']; 
  $curr = $dets['pay_currency']; 
  $jidd  = $dets['jidd'];
   $jn = $dets['name']; 
   $sd = $dets['startdate'];
    $ck = $dets['checkedin'];
$name = substr($nm,0,16).'..';
$rating = $dets['rating'];
$uid = $dets['id']; 


	$sdate = $dets['startdate'];
	$startdate = date('D M j Y', $sdate);
    $starttime = date('H:i', $sdate);
    $jfrom = $startdate." ".$starttime.":00 GMT+0300 (East Africa Time)";
?> 


 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $uid; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
echo $jn;
?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var jf = "<?php echo $jfrom; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date();


  var difference = now.getTime() - dateEntered.getTime();

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    	var payperiod = "<?php echo $per; ?>";
  var payamount = "<?php echo $pay; ?>";
  var paypeople = 1;
  var curr  = "<?php echo $curr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount<?php echo $jidd; ?>").text(tt+" "+curr);
  }
  else if(payperiod === 'MONTH'){

  	var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
  	var dd  = hh/24;
  	var mm = dd/30;
  var total = payamount*mm;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
  	var dd  = hh/24;
  	var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
  	var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
   	var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount<?php echo $jidd; ?>").text(m+" "+curr);

  }

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  
}
  </script>
<div class="row font-weight-bold" id="amount<?php echo $jidd; ?>" style="font-size:13px;color:red;">&nbsp;
</div>
</div>
<div class="col-2">
<a class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="j<?php echo $jidd; ?>"><i class="fas fa-info" aria-hidden="true"></i></a>
</div>
</div>
</div>

<script>
    $("#j<?php echo $jidd; ?>").click(
     function (){
      window.location='?page=hire&jid=<?php echo $jidd;?>';
      }
    );
    </script>


                <div id="collapse<?php echo $id; ?>" class="collapse mt-0 pt-0" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>" data-parent="#propose">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold">SKILLS</span><br />
                        <?php echo $fname; ?></p>
                    </div>
                </div>
                
</div> 
</div>
<script>
$("#dell<?php echo $id; ?>").click(function (){
 $("#jdd<?php echo $id; ?>").dropdown();
});
</script>






<?php
}
?>

</div>
</div>
</div> 


<?php
}
?>               

 <!--open jobs end here-->         
<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary mb-3"  style="border-width: 2px !important;border:2px solid <?php echo $tt; ?> !important;"> 
<div class="nd"style="margin-bottom: 0px !important;border:none !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" ><i class="fas fa-briefcase tt ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    TOP EMPLOYERS
    </span>
    </h4>
    </div>
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >
<?php
$myid = $_SESSION['id'];
$ev = "SELECT * FROM users WHERE type = 1 AND id != $myid ORDER BY rating desc LIMIT 6";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
  $nm = $dets['bname']; 
$name = substr($nm,0,16).'..';
$rating = $dets['rating'];
$uid = $dets['id']; 
?> 

<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp" > 
<div class="card z-depth-1 rounded-bottom">
<a onclick='mapmodal("<?php echo $nm; ?>","<?php echo $uid; ?>","<?php echo $dets['image']; ?>","<?php echo $rating; ?>")'>
<img class='card-img z-depth-0' src='<?php echo $dets['image']; ?>' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/></a>                
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;" class="mx-2 text-center" >
<?php

echo $name;
?>
 
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   
<div class="lighten-3 text-center pt-0 rounded-bottom" >
<?php 

showrating($rating);
?>  
</div>
<?php 
$ls = $dets['lsts']; 

?>

    <div style="position:absolute;top:2px !important;right:2px !important;" id="online<?php echo $uid; ?>">
    </div>
<script>
window.setInterval(function(){
var uid = "<?php echo $uid; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#online<?php echo $uid; ?>").val(data);
$("#online<?php echo $uid; ?>").html(data);
});   
}, 5000);
</script>


</div>
</div>




<?php
}
}
?>               
</div>
</div>
</div> 
<?php } ?>


<?php
$ut = $_SESSION['utype'];
if($ut != 3){

  //contractors were here
 ?>

<?php } ?>


<?php
$ut = $_SESSION['utype'];
if($ut != 2){






 ?>

<?php
$myid = $_SESSION['id'];
$ev = "SELECT * FROM users WHERE type = 2 AND id != $myid AND id NOT IN (SELECT employeeid FROM hired WHERE completed = 0 AND checkedin = 1 )  ORDER BY rating desc LIMIT 6 ";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
	?>

	<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary mb-3"  style="border-width: 2px !important;"> 
<div class="nd"style="margin-bottom: 0px !important;border:none !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" ><i class="fas fa-hard-hat tt ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    TOP EMPLOYEES
    </span>
    </h4>
    </div>
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >



	<?php
while($det = $evarray->fetch_array()){
?> 

<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp"  > 
<div class="card z-depth-1 rounded-bottom">
<a onclick='mapmodal("<?php echo $nm; ?>","<?php echo $uid; ?>","<?php echo $det['image']; ?>","<?php echo $rating; ?>")'>
<img class='card-img z-depth-0' src='<?php echo $det['image']; ?>' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/></a>               
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;" class="mx-2 text-center" >
<?php
$nm = $det['fname']; 
$lm = $det['lname']; 
$uid = $det['id']; 
echo $nm." ".$lm;
?>
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   
<div class="lighten-3 text-center pt-0 rounded-bottom" >
<?php 
$rating = $det['rating'];
showrating($rating)
?>  
</div>
   <div style="position:absolute;top:2px !important;right:2px !important;" id="online<?php echo $uid; ?>">
    </div>
<script>
window.setInterval(function(){
var uid = "<?php echo $uid; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#online<?php echo $uid; ?>").val(data);
$("#online<?php echo $uid; ?>").html(data);
});   
}, 5000);

</script>
</div>
</div>




<?php
}
?>

</div>
</div>
</div>


<?php
}
?>               
</div>
</div>
</div>
<?php } ?>


 
 
 
 
 
 <?php }else{?>   
 
 
        
 
   

    <div class="container">
        <!--Projects section v.2-->
        <section class="text-center">

            <!--Section heading-->
            <h2 class=" mt-5">
                <strong class="tt" style="font-size:25px;">welcome <?php if(isset($_SESSION['idd'])){ echo $_SESSION['username']." ,"; } ?> to <?php echo strtolower($an); ?></strong>
            </h2>
            <!--Section description-->
   <p class="mb-5 pb-4">This is where employers meet the <b>BEST</b> labour and employees <b>QUICKLY</b>.</p>
  <div class="row mb-r d-flex justify-content-center" >
  <div class="card-deck col-10 col-lg-12 col-xl-12 col-md-12">

    <div class="col-12">

  <div class="wow fadeInUp row rounded" style="border: 2px solid <?php echo $tt; ?>" >
   <div class="col-12 text-center align-items-center">
    <i class="fas fa-hard-hat tt " style="font-size:130px;position: relative;top: 20%;"></i>
    </div>  
    <div class="col-12 p-2" style="">
    <h4 class="font-bold">
    <strong class="tt">EMPLOYEES</strong>
    </h4>
    <p>Join us as an  employee to get the best and nearest jobs in the fastest way possible</p>
    <a href="?page=staffregister"class="btn btn-outline-primary waves-effect" style="background-color:<?php echo $tt; ?> !important;border-color:<?php echo $tt; ?> !important;color:<?php echo $tbg; ?> !important;"> JOIN EMPLOYEES</a>
    </div>
    </div>





     <div class="wow fadeInUp row rounded mt-4" style="border: 2px solid <?php echo $tt; ?>" >
   <div class="col-12 text-center align-items-center">
    <i class="fas fa-briefcase tt " style="font-size:130px;position: relative;top: 20%;"></i>
    </div>  
    <div class="col-12 p-2 mt-2" style="">
    <h4 class="font-bold">
    <strong class="tt">EMPLOYERS</strong>
    </h4>
    
    <p>Join us as an  employer to find the best skill/labour in the fastest way possible</p>
    <a href="?page=clientregister"class="btn btn-outline-primary waves-effect" style="background-color:<?php echo $tt; ?> !important;border-color:<?php echo $tt; ?> !important;color:<?php echo $tbg; ?> !important;"> JOIN EMPLOYERS</a>
    </div>
    </div>

    </div>



  </div>

        </section>
        <!--/Projects section v.2-->
        <hr>

        <!--Pagination dark-->
        <!--/Pagination dark-->

    </div>
    <!--/.Main layout--> 
    <?php } ?>  
    
    
    
<div class="modal fade" id="nismodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <div class="nav nav-tabs md-tabs tabs-2 purple darken-3" role="tablist">
                        <a class="nav-link text-center" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> The <?php 
    $iid = $_SESSION['industry'];
    $industries = "SELECT * FROM industries WHERE id = '$iid'";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    echo $iname." Industry "; 
    }}else{
    
    echo "Industry you entered";
    }  
    ?>  is new here, add 5 skills on it to verify. </a>
                   
                </div>

                <!-- Tab panels -->
                <div class="tab-content">
                

                    <!--Panel 8-->
                    <div class="tab-pane fade in show active text-center" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body text-center">

       <form id="skillform" method="POST" action="#" class="text-center">
    <input type="text" id="skill1" name="skill1" class="form-control mb-4 skills" placeholder="skill 1">
    
     <input type="text" id="skill2" name="skill2" class="form-control mb-4 skills" placeholder="skill 2">

      <input type="text" id="skill3" name="skill3" class="form-control mb-4 skills" placeholder="skill 3">

 <input type="text" id="skill4" name="skill4" class="form-control mb-4 skills" placeholder="skill 4">

 <input type="text" id="skill5" name="skill5" class="form-control mb-4 skills" placeholder="skill 5">
 <button type="submit" name="skillsub" id="skillsub" class="d-none">SUBMIT</button>
 </form>




                            <div class="text-center form-sm mt-2">
                                <button class="btn btn-secondary darken-3" id="skillb">Add & Continue <i class="fa fa-sign-in ml-1"></i></button>
                            </div>
<script>
$("#skillb").click(function (){
var s1 = $("#skill1").val();
var s2 = $("#skill2").val();
var s3 = $("#skill3").val();
var s4 = $("#skill4").val();
var s5 = $("#skill5").val();

if(s1===""||s1===null){
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
 Command: toastr["error"]("Enter skill 1 to continue", "NO SKILL 1 !") ;
 $(".skills").removeClass("invalid");
 $("#skill1").addClass("invalid");

}
else if(s2===""||s2===null){
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
 Command: toastr["error"]("Enter skill 2 to continue", "NO SKILL 2 !") ;
 $(".skills").removeClass("invalid");
 $("#skill2").addClass("invalid");

}
else if(s3===""||s3===null){
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
 Command: toastr["error"]("Enter skill 3 to continue", "NO SKILL 3 !") ;
 $(".skills").removeClass("invalid");
 $("#skill3").addClass("invalid");

}
else if(s4===""||s4===null){
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
 Command: toastr["error"]("Enter skill 4 to continue", "NO SKILL 1 !") ;
 $(".skills").removeClass("invalid");
 $("#skill4").addClass("invalid");

}
else if(s5===""||s5===null){
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
 Command: toastr["error"]("Enter skill 5 to continue", "NO SKILL 1 !") ;
 $(".skills").removeClass("invalid");
 $("#skill5").addClass("invalid");

}else{
$(".skills").removeClass("invalid");
$("#skillsub").click();
}


});
</script>

                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->



<div class="modal fade" id="nicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <div class="nav nav-tabs md-tabs tabs-2 purple darken-3" role="tablist">
                        <a class="nav-link text-center" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> The <?php 
    $iid = $_SESSION['industry'];
    $industries = "SELECT * FROM industries WHERE id = '$iid'";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    echo $iname." Industry "; 
    }}else{
    
    echo "Industry you entered";
    }  
    ?>  is new here, add 5 sub-industries on it to verify. </a>
                   
                </div>

                <!-- Tab panels -->
                <div class="tab-content">
                

                    <!--Panel 8-->
                    <div class="tab-pane fade in show active text-center" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body text-center">

       <form id="skillform" method="POST" action="#" class="text-center">
    <input type="text" id="skill1" name="skill1" class="form-control mb-4 skills" placeholder="sub-industry 1">
    
     <input type="text" id="skill2" name="skill2" class="form-control mb-4 skills" placeholder="sub-industry 2">

      <input type="text" id="skill3" name="skill3" class="form-control mb-4 skills" placeholder="sub-industry 3">

 <input type="text" id="skill4" name="skill4" class="form-control mb-4 skills" placeholder="sub-industry 4">

 <input type="text" id="skill5" name="skill5" class="form-control mb-4 skills" placeholder="sub-industry 5">
 <button type="submit" name="subisub" id="subisub" class="d-none">SUBMIT</button>
 </form>




                            <div class="text-center form-sm mt-2">
                                <button class="btn btn-secondary darken-3" id="skillb">Add & Continue <i class="fa fa-sign-in ml-1"></i></button>
                            </div>
<script>
$("#skillb").click(function (){
var s1 = $("#skill1").val();
var s2 = $("#skill2").val();
var s3 = $("#skill3").val();
var s4 = $("#skill4").val();
var s5 = $("#skill5").val();

if(s1===""||s1===null){
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
 Command: toastr["error"]("Enter sub-industry 1 to continue", "NO SUB-INDUSTRY 1 !") ;
 $(".skills").removeClass("invalid");
 $("#skill1").addClass("invalid");

}
else if(s2===""||s2===null){
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
 Command: toastr["error"]("Enter sub-industry 2 to continue", "NO SUB-INDUSTRY 2 !") ;
 $(".skills").removeClass("invalid");
 $("#skill2").addClass("invalid");

}
else if(s3===""||s3===null){
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
 Command: toastr["error"]("Enter sub-industry 3 to continue", "NO SUB-INDUSTRY 3 !") ;
 $(".skills").removeClass("invalid");
 $("#skill3").addClass("invalid");

}
else if(s4===""||s4===null){
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
 Command: toastr["error"]("Enter sub-industry 4 to continue", "NO SUB-INDUSTRY 4 !") ;
 $(".skills").removeClass("invalid");
 $("#skill4").addClass("invalid");

}
else if(s5===""||s5===null){
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
 Command: toastr["error"]("Enter sub-industry 5 to continue", "NO SUB-INDUSTRY 5!") ;
 $(".skills").removeClass("invalid");
 $("#skill5").addClass("invalid");

}else{
$(".skills").removeClass("invalid");
$("#skillsub").click();
}


});
</script>

                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->
      
<script type="text/javascript">
  $(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
