<?php 
$jid = $_GET['jid'];
$myid = $_SESSION['id'];
include 'common.php';


if(isset($_POST['cib'])){




$jq = "UPDATE `hired` SET `checkedin` = '1' WHERE `hired`.`jobid` = $jid AND `hired`.`employeeid` = $myid ";
$jqa = $conn->query($jq);
if (!$jqa){
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
  Command: toastr["error"]("error..couldnt checkin");
</script>

<?php }else{ 


  $sql = "SELECT h.employerid , u.p1 as p , u.bname ,j.name as jname FROM hired h,users u , jobs j WHERE h.jobid = $jid AND h.employeeid = $myid AND u.id = h.employerid AND j.id = h.jobid";
$jqa = $conn->query($sql);
if ($jqa->num_rows > 0) {
while($j = $jqa->fetch_array()){
  $t = $j['p'];
  $j = $j['bname'];
  $b = $j['jbname'];
  

  $to = "+254".$t;




  $mess = "Hallo ".$b.", ".$_SESSION['username']." Just checked in for the ".$j." job";


  sendmessage($to,$mess);
  ?>

  <script type="text/javascript">
  window.location.href = '?page=hire&jid=<?php echo $jid;?>';
  </script>


  <?php

}}


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
  Command: toastr["success"]("checked in successfully");


</script>





<?php 
}
}



if(isset($_POST['sjb'])){


$jq = "SELECT * FROM `jobs` WHERE id = $jid";
$jqa = $conn->query($jq);
if ($jqa->num_rows > 0) {
while($j = $jqa->fetch_array()){
  $s  = $j['active'];
  if($s == 0){

$reg = "UPDATE `jobs` SET `active` = '1' WHERE `jobs`.`id` = $jid";
$regarray = $conn->query($reg);
$now = time();
$now = $now + 3600;
$reg = "UPDATE `jobs` SET `startdate` = $now WHERE `jobs`.`id` = $jid";
$regarray = $conn->query($reg);


?>

<script type="text/javascript">
  window.location.href = '?page=activejobs';
</script>



<?php
}}}



}
?>
<style type="text/css">
  .md-tabs .nav-item .nav-link{
  font-weight : bold !important;
  color: <?php echo $tt; ?> !important;
  }
  .md-tabs .nav-item .active{
  background-color: <?php echo $tt; ?> !important;
  color: white !important;
  }
</style>
 <section class="pgs" style="margin-bottom: 0px !important;height:88vh !important;width:100% !important;border:2px solid <?php echo $tt; ?> !important;">
<div class="" style="">
    
       <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
      <?php 
      if($_SESSION['utype'] == 2){
      echo 'job details';
    }else{
   echo 'job details';
  }?>
    </span>
    </h4>

    </div>
<!-- Nav tabs -->



<?php 
if($_SESSION['utype'] == 2){
$jqz = "SELECT * FROM `jobs` WHERE id = $jid";
$jqaz = $conn->query($jqz);
if ($jqaz->num_rows > 0) {
while($j = $jqaz->fetch_array()){
  $jn = $j['name'];
  $jp = $j['pay_per'];
  $ja = $j['pay_amount'];
  $jcurr = $j['pay_currency'];
  $sdate = $j['startdate'];
  $edate = $j['enddate'];
   $enddate = date('D M j Y', $edate);
    $endtime = date('H:i', $edate);
    $jto = $enddate." ".$endtime.":00 GMT+0300 (East Africa Time)";
  $startdate = date('D M j Y', $sdate);
    $starttime = date('H:i', $sdate);
    $jfrom = $startdate." ".$starttime.":00 GMT+0300 (East Africa Time)";

$jh = "SELECT COUNT(*) FROM `hired` WHERE jobid = $jid";
$jha = $conn->query($jh);
if ($jha->num_rows > 0) {
while($jh = $jha->fetch_array()){
  $hiredno = $jh['COUNT(*)'];

}}

    ?>



<center>
  <h5 class="mt-1" style="color:<?php echo $tt; ?> !important;font-weight: bold;"><i class="fa fa-briefcase"></i> <?php echo $jn; ?></h5>
  <h6 class="mb-2 mb-sm-0 pt-1 mr-auto" id="cdt" style="color:<?php echo $tt; ?> !important;font-weight: bold;">
 
 <?php
   $jh = "SELECT COUNT(*) FROM `hired` WHERE jobid = $jid";
$jha = $conn->query($jh);
$mid = $_SESSION['id'];

$js = "SELECT j.*,j.id as jidd ,h.checkedin FROM jobs j,hired h WHERE j.id = $jid AND h.jobid = $jid AND h.employeeid = $mid ";
$jsa = $conn->query($js);

?>




<?php
if ($jsa->num_rows > 0) {
while($k = $jsa->fetch_array()){
$jact = $k['active']; 
$jcom = $k['completed']; 
$jc = $k['checkedin']; 
$jidd = $k['jidd']; 
$jlat = $k['job_lat']; 
$jlong = $k['job_long'];
}}

if ($jha->num_rows > 0 && $jact == 0 && $jcom == 0) {

if($jc == 0){?>

<form id="cif" method="POST" action="" class="my-0">
  <input type="hidden" name="jid" value="<?php echo $jidd; ?>">
  <button type="submit" name="cib" id="cib" class="d-none">start</button>

  <a class="btn-floating blue my-0"  id="pib"><i class="fa fa-check"></i></a>

</form>
<br /><span>  CHECK IN</span>


<script type="text/javascript">
  $("#pib").click(function (){
     
    var km = getkm(-1.2824849999999999,36.8842066,-1.2824849999999999,36.8842076)
    if(km < 0.08){

        $("#cib").click();

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
  Command: toastr["success"]("checking in...");


    }else{


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
  Command: toastr["error"]("too far..please move to job");

    

    }


     function getkm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}

     /*$("#sjb").click();*/
  });
</script>






<?php 
}else{
  echo 'WAITING TO START JOB';
}
}elseif($jact == 1 && $jc == 0 ||  $jcom == 1 && $jc == 0){?>
<span style="color: red;">SORRY. YOU WERE LATE TO CHECK IN</span>

<?php }elseif($jcom == 1){?>


<!-----calculate pay per employee----->



  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var jf = "<?php echo $sdate; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date("<?php echo $jto; ?>");


  var difference = dateEntered.getTime() - now.getTime() ;
  if (difference <= 0 || jf === 0 || jf === "0") {

    // Timer done
    $(cdt).text("job not started");
    $(cdt).css("color", "red");

  
  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("mins")}else{$(ms).text("min")};
    if(seconds !== 1){ $(ss).text("secs")}else{$(ss).text("sec")}; 


      var payperiod = "<?php echo $jp; ?>";
  var payamount = "<?php echo $ja; ?>";
  var paypeople = 1;
  var curr  = "<?php echo $jcurr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount").text(tt+" "+curr);
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
  $("#amount").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var dd  = hh/24;
    var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
    var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }

    

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>



          </h6>

          <h6 id="" style="color:<?php echo $tt;?>;font-weight: bold;">AMOUNT PAYABLE : <span id="amount" style="color:red;font-weight: bold;"></span></h6>




<!------calculate pay per employee ----->





<?php }else{?>
 


  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var jf = "<?php echo $sdate; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date();


  var difference = now.getTime() - dateEntered.getTime();
  if (difference <= 0 || jf === 0 || jf === "0") {

    // Timer done
    $(cdt).text("hire to start job");
    $(cdt).css("color", "red");

  
  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("mins")}else{$(ms).text("min")};
    if(seconds !== 1){ $(ss).text("secs")}else{$(ss).text("sec")}; 


      var payperiod = "<?php echo $jp; ?>";
  var payamount = "<?php echo $ja; ?>";
  var paypeople = 1;
  var curr  = "<?php echo $jcurr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount").text(tt+" "+curr);
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
  $("#amount").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var dd  = hh/24;
    var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
    var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }

    

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>


<?php } ?>
          </h6>


          <h6 id="amount" style="color:red;font-weight: bold;"></h6>
          </center>





  <?php }}


?>

<!-- TIMER -->


  


<!-- TIMER ENDS -->
<ul class="nav nav-tabs md-tabs nav-justified  mt-1 z-depth-0" role="tablist" style="background-color:white !important;">
    
    <li class="nav-item mx-5">
        <a class="nav-link active" data-toggle="tab" href="#panel666" role="tab">
        <i class="fas fa-users"></i> YOUR TEAM</a>
    </li>
</ul>
<!-- Nav tabs -->
<!-- Tab panels -->
<div class="tab-content mt-0">
    <!--Panel 1-->
    <div class="tab-pane fade in  mt-0" id="panel555" role="tabpanel">
       
<div class="card card-cascade card-ecommerce narrower m-1 mt-0 mt-5 z-depth-0 "  style="margin-top:0px !important;"> 

<?php
$id = $_SESSION['id'];
$evk = "SELECT q.*, u.* ,q.id AS qid FROM queue q,users u WHERE q.deleted = 0 AND q.employer = $id AND u.id = q.employee AND u.id NOT IN (SELECT employeeid FROM hired WHERE employerid = $id AND completed = 0)";

$evarrayk = $conn->query($evk);
if ($evarrayk->num_rows > 0) {
while($k = $evarrayk->fetch_array()){
$fname = $k['fname']; 
$id = $k['id']; 
$qid = $k['qid']; 
$lname = $k['lname'];
$image = $k['image'];  
$email = $k['email']; 
$rating = $k['rating']; 


if (!file_exists($image)){
  $image  = 'uploads/profileimages/bu.png';
}
//$name = substr($nm,0,21).'';
 ?>
 
 
 
 
 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $id ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $id; ?>").val(data);
$("#onlinej<?php echo $id; ?>").html(data);
});   
}, 5000);
</script>
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
$nm = $fname." ".$lname; 
$sc = substr($nm,0,10).'';
echo $sc;

?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div></div>
<div class="col-2">
<?php
$p = "";

$chk = "SELECT * FROM job_proposed WHERE staff_id = $id AND job_id = $jid AND hired = 1";
$carray = $conn->query($chk);
if ($carray->num_rows > 0) {
$p = 1;

}

{
?>


<a href="#" data-toggle="tooltip" title="checked in!" class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="propose<?php echo $id; ?>" style="background-color:<?php echo $tt; ?> !important;" ><i class="fa fa-check" aria-hidden="true"></i></a>


<a href="#" data-toggle="tooltip" title="not checked in!" class="btn-floating btn-sm z-depth-0 mx-auto text-success font-weight-bold <?php if($p != 1){echo "d-none";}else{}?>" id="proposed<?php echo $id; ?>" ><i class="fa fa-check text-success" aria-hidden="true"></i></a>


<script>

$("#propose<?php echo $id; ?>").click(function () {

    var ss<?php echo $id; ?> = $("#skillscore<?php echo $id; ?>").val();

   /*alert("ajax/hire.php?job="+"<?php echo $jid; ?>"+"&employee="+"<?php echo $id;?>"+"&employer="+"<?php echo $_SESSION['id']; ?>"+"&username="+"<?php echo $_SESSION['username']; ?>"+"&qid="+"<?php echo $qid; ?>");*/


   $.post("ajax/hire.php?job="+"<?php echo $jid; ?>"+"&employee="+"<?php echo $id;?>"+"&employer="+"<?php echo $_SESSION['id']; ?>"+"&username="+"<?php echo $_SESSION['username']; ?>"+"&qid="+"<?php echo $qid; ?>", function(data) {
     var data = parseInt(data);
    /*alert(data);*/
if(data === 1 || data === '1'){


  $("#propose<?php echo $id; ?>").addClass("disabled");
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
  Command: toastr["success"]("hired successfully");
}else{
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
  Command: toastr["error"]("error..try again");
}

});
});

</script>
<?php } ?>
</div>
</div>
</div>


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





<?php }}else{ ?>


 <div class="align-items-middle text-center center-text my-auto" style="margin-top: 50px !important;">

        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">OOPS!, YOUR QUEUE IS EMPTY</span>
  
      </div>


<?php } ?>
</div>
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane fade mt-0 active show" id="panel666" role="tabpanel">



<?php
$id = $_SESSION['id'];
$evk = "SELECT h.*,u.* FROM users u,hired h WHERE h.jobid = $jid AND u.id = h.employeeid ORDER BY u.rating DESC";
$evarrayk = $conn->query($evk);
if ($evarrayk->num_rows > 0) {
while($k = $evarrayk->fetch_array()){
$fname = $k['fname']; 
$lname = $k['lname'];
$image = $k['image'];  
$email = $k['email']; 
$rating = $k['rating']; 
$ck = $k['checkedin']; 
//$name = substr($nm,0,21).'';
if (!file_exists($image)){
  $image  = 'uploads/profileimages/bu.png';
}
 ?>
 
 
 
 
 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $id ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $id; ?>").val(data);
$("#onlinej<?php echo $id; ?>").html(data);
});   
}, 5000);
</script>
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
$nm = $fname." ".$lname; 
$sc = substr($nm,0,10).'';
echo $sc;

?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div></div>
<div class="col-2">
<?php
$p = "";

$chk = "SELECT * FROM job_proposed WHERE staff_id = $id AND job_id = $jid AND hired = 1";
$carray = $conn->query($chk);
if ($carray->num_rows > 0) {
$p = 1;

}

{
?>

<?php if($ck == 1){?>
<a  href="#" data-toggle="tooltip" title="checked in!"  class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="hire<?php echo $id; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
<?php }else{ ?>

  <a  href="#" data-toggle="tooltip" title="not checked in!"  class="btn-floating btn-sm btn-danger z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="hire<?php echo $id; ?>"><i class="far fa-clock" aria-hidden="true"></i></a>


<?php } ?>


<div class="btn-floating btn-sm z-depth-0 mx-auto text-success font-weight-bold <?php if($p != 1){echo "d-none";}else{}?>" id="proposed<?php echo $id; ?>"><i class="fa fa-check text-success" aria-hidden="true"></i></div>


<script>

$("#hire<?php echo $id; ?>").click(function () {

    var ss<?php echo $id; ?> = $("#skillscore<?php echo $id; ?>").val();

   $.post("ajax/hirestaff.php?jid="+"<?php echo $jid; ?>"+"&staffemail="+"<?php echo $email; ?>"+"&ss="+"<?php  echo $ss; ?>"+"&contractstr="+"<?php echo $contractstr;?>"+"&contractor="+"<?php echo $contractor;?>"+"&jpid="+"<?php echo $id;?>", function(data) {  
   if (data === 1 || data === "1"){
  
   $("#hire<?php echo $id; ?>").addClass(" d-none");
    $("#hire<?php echo $id; ?>").removeClass("d-none");
   
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
 Command: toastr["success"]("", "HIRED SUCCESSFULLY") ;  
   
   
   
   }else{
   
   
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
 Command: toastr["error"]("", "ERROR ,try again later!") ;
   
   
   
   
   }
   });

});

</script>
<?php } ?>
</div>
</div>
</div>


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





<?php }}else{ ?>

      <div class="align-items-middle text-center center-text my-auto" style="margin-top: 50px !important;">
        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">NO HIRED EMPLOYEES</span>
  
      </div>
<?php } ?>
    </div>
    <!--/.Panel 2-->
</div>
<!-- Tab panels -->
</div>
</section>

<?php } ?>



<?php 
if($_SESSION['utype'] == 1){
$jqz = "SELECT * FROM `jobs` WHERE id = $jid";
$jqaz = $conn->query($jqz);
if ($jqaz->num_rows > 0) {
while($j = $jqaz->fetch_array()){
	$jn = $j['name'];
	$jp = $j['pay_per'];
	$ja = $j['pay_amount'];
	$jcurr = $j['pay_currency'];
	$sdate = $j['startdate'];
  $edate = $j['enddate'];
   $enddate = date('D M j Y', $edate);
    $endtime = date('H:i', $edate);
    $jto = $enddate." ".$endtime.":00 GMT+0300 (East Africa Time)";
	$startdate = date('D M j Y', $sdate);
    $starttime = date('H:i', $sdate);
    $jfrom = $startdate." ".$starttime.":00 GMT+0300 (East Africa Time)";

$jh = "SELECT COUNT(*) FROM `hired` WHERE jobid = $jid AND checkedin = 1";
$jha = $conn->query($jh);
if ($jha->num_rows > 0) {
while($jh = $jha->fetch_array()){
	$hiredno = $jh['COUNT(*)'];

}}

    ?>



<center>
	<h5 class="mt-1" style="color:<?php echo $tt; ?> !important;font-weight: bold;"><i class="fa fa-briefcase"></i> <?php echo $jn; ?></h5>
  <h6 class="mb-2 mb-sm-0 pt-1 mr-auto" id="cdt" style="color:<?php echo $tt; ?> !important;font-weight: bold;">
 
 <?php
   $jh = "SELECT COUNT(*) FROM `hired` WHERE jobid = $jid";
$jha = $conn->query($jh);

$js = "SELECT * FROM `jobs` WHERE id = $jid";
$jsa = $conn->query($js);
if ($jsa->num_rows > 0) {
while($k = $jsa->fetch_array()){
$jact = $k['active']; 
$jcom = $k['completed']; 
}}

if ($jha->num_rows > 0 && $jact == 0 && $jcom == 0) {?>


<form id="sjf" method="POST" action="" class="my-0">
  <input type="hidden" name="jid" value="<?php echo $jid; ?>">
  <button type="submit" name="sjb" id="sjb" class="d-none">start</button>

  <a class="btn-floating blue my-0"  id="pb"><i class="fas fa-play"></i></a>

</form>
<br /><span>  START</span>


<script type="text/javascript">
  $("#pb").click(function (){
     $("#sjb").click();
  });
</script>

<?php }
elseif($jcom == 1){?>


<?php if($_SESSION['utype'] == 1){?>




  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>

  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

$(window).ready(function(){
  timeBetweenDates(compareDate);
});
  

function timeBetweenDates(toDate) {
  var jf = "<?php echo $sdate; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date("<?php echo $jto; ?>");

  var difference = dateEntered.getTime() - now.getTime();
  if (difference <= 0 || jf === 0 || jf === "0") {

    // Timer done
    $(cdt).text("job was not started");
    $(cdt).css("color", "red");

  
  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;



    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("mins")}else{$(ms).text("min")};
    if(seconds !== 1){ $(ss).text("secs")}else{$(ss).text("sec")}; 




      var payperiod = "<?php echo $jp; ?>";
  var payamount = "<?php echo $ja; ?>";
  var paypeople = 1;
  var curr  = "<?php echo $jcurr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount").text(tt+" "+curr);
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
  $("#amount").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var dd  = hh/24;
    var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
    var sec =  difference/1000;
    var min = sec/60;
    var hh  = min/60;
    var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }

    

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>






<?php }?>



<?php }else{?>
 


  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var jf = "<?php echo $sdate; ?>";


  var dateEntered = new Date("<?php echo $jfrom; ?>");
  var now = new Date();


  var difference = now.getTime() - dateEntered.getTime();
  if (difference <= 0 || jf === 0 || jf === "0") {

    // Timer done
    $(cdt).text("hire to start job");
    $(cdt).css("color", "red");

  
  } else {

    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("mins")}else{$(ms).text("min")};
    if(seconds !== 1){ $(ss).text("secs")}else{$(ss).text("sec")}; 


    	var payperiod = "<?php echo $jp; ?>";
  var payamount = "<?php echo $ja; ?>";
  var paypeople = "<?php echo $hiredno; ?>";
  var curr  = "<?php echo $jcurr; ?>"; 

  if(payperiod === 'COMPLETION'){
 var tt = payamount*paypeople;
$("#amount").text(tt+" "+curr);
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
  $("#amount").text(m+" "+curr);
  }
  else if(payperiod === 'DAY'){
     var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
  	var dd  = hh/24;
  	var total = payamount*dd;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }
  else if(payperiod === 'HOUR'){
  	var sec =  difference/1000;
  	var min = sec/60;
  	var hh  = min/60;
   	var total = payamount*hh;
  var m = total*paypeople;
  m = m.toFixed(2);
  $("#amount").text(m+" "+curr);

  }

    

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>


<?php } ?>
          </h6>


        <?php if($jcom == 1){?> 

           <h6 id="" style="color:<?php echo $tt;?>;font-weight: bold;">AMOUNT PAYABLE : <span id="amount" style="color:red;font-weight: bold;"></span></h6>

  <?php }else{
    ?>  <h6 id="amount" style="color:red;font-weight: bold;"></h6>
         
 <?php } ?>
  </center>





	<?php }} ?>

<!-- TIMER -->


  


<!-- TIMER ENDS -->
<ul class="nav nav-tabs md-tabs nav-justified  mt-1 z-depth-0" role="tablist" style="background-color:white !important;">
  <?php if($jcom == 1){

  }else{
    ?>

     <li class="nav-item">
        <a class="nav-link " data-toggle="tab" href="#panel555" role="tab">
        <i class="fa fa-user"></i> QUEUED</a>
    </li>

    <?php 
  }
  ?>
   
    <li class="nav-item <?php if($jcom == 1){?> mx-5

  <?php }
    ?>">
        <a class="nav-link active" data-toggle="tab" href="#panel666" role="tab">
        <i class="fa fa-briefcase"></i> HIRED</a>
    </li>
</ul>
<!-- Nav tabs -->
<!-- Tab panels -->
<div class="tab-content mt-0">
    <!--Panel 1-->
    <div class="tab-pane fade in  mt-0" id="panel555" role="tabpanel">
       
<div class="card card-cascade card-ecommerce narrower m-1 mt-0 mt-5 z-depth-0 "  style="margin-top:0px !important;"> 

<?php
$id = $_SESSION['id'];
$evk = "SELECT q.*, u.* ,q.id AS qid FROM queue q,users u WHERE q.deleted = 0 AND q.employer = $id AND u.id = q.employee AND u.id NOT IN (SELECT employeeid FROM hired WHERE employerid = $id AND completed = 0)";

$evarrayk = $conn->query($evk);
if ($evarrayk->num_rows > 0) {
while($k = $evarrayk->fetch_array()){
$fname = $k['fname']; 
$id = $k['id']; 
$qid = $k['qid']; 
$lname = $k['lname'];
$image = $k['image'];  
$email = $k['email']; 
$rating = $k['rating']; 


if (!file_exists($image)){
  $image  = 'uploads/profileimages/bu.png';
}
//$name = substr($nm,0,21).'';
 ?>
 
 
 
 
 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $id ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $id; ?>").val(data);
$("#onlinej<?php echo $id; ?>").html(data);
});   
}, 5000);
</script>
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
$nm = $fname." ".$lname; 
$sc = substr($nm,0,10).'';
echo $sc;

?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div></div>
<div class="col-2">
<?php
$p = "";

$chk = "SELECT * FROM job_proposed WHERE staff_id = $id AND job_id = $jid AND hired = 1";
$carray = $conn->query($chk);
if ($carray->num_rows > 0) {
$p = 1;

}

{
?>


<a class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="propose<?php echo $id; ?>" style="background-color:<?php echo $tt; ?> !important;" ><i class="fa fa-check" aria-hidden="true"></i></a>


<div class="btn-floating btn-sm z-depth-0 mx-auto text-success font-weight-bold <?php if($p != 1){echo "d-none";}else{}?>" id="proposed<?php echo $id; ?>" ><i class="fa fa-check text-success" aria-hidden="true"></i></div>


<script>

$("#propose<?php echo $id; ?>").click(function () {

    var ss<?php echo $id; ?> = $("#skillscore<?php echo $id; ?>").val();

   /*alert("ajax/hire.php?job="+"<?php echo $jid; ?>"+"&employee="+"<?php echo $id;?>"+"&employer="+"<?php echo $_SESSION['id']; ?>"+"&username="+"<?php echo $_SESSION['username']; ?>"+"&qid="+"<?php echo $qid; ?>");*/


   $.post("ajax/hire.php?job="+"<?php echo $jid; ?>"+"&employee="+"<?php echo $id;?>"+"&employer="+"<?php echo $_SESSION['id']; ?>"+"&username="+"<?php echo $_SESSION['username']; ?>"+"&qid="+"<?php echo $qid; ?>", function(data) {
     var data = parseInt(data);
    /*alert(data);*/
if(data === 1 || data === '1'){


  $("#propose<?php echo $id; ?>").addClass("disabled");
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
  Command: toastr["success"]("hired successfully");
}else{
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
  Command: toastr["error"]("error..try again");
}

});
});

</script>
<?php } ?>
</div>
</div>
</div>


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





<?php }}else{ ?>


 <div class="align-items-middle text-center center-text my-auto" style="margin-top: 50px !important;">

        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">OOPS!, YOUR QUEUE IS EMPTY</span>
  
      </div>


<?php } ?>
</div>
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane fade mt-0 active show" id="panel666" role="tabpanel">



<?php
$id = $_SESSION['id'];
$evk = "SELECT h.*,u.* FROM users u,hired h WHERE h.jobid = $jid AND h.employerid = $id AND u.id = h.employeeid ORDER BY u.rating DESC";
$evarrayk = $conn->query($evk);
if ($evarrayk->num_rows > 0) {
while($k = $evarrayk->fetch_array()){
$fname = $k['fname']; 
$lname = $k['lname'];
$image = $k['image'];  
$email = $k['email']; 
$rating = $k['rating']; 
$ck     = $k['checkedin'];
//$name = substr($nm,0,21).'';
if (!file_exists($image)){
  $image  = 'uploads/profileimages/bu.png';
}
 ?>
 
 
 
 
 <div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-1 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle z-depth-0 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $id ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $id; ?>").val(data);
$("#onlinej<?php echo $id; ?>").html(data);
});   
}, 5000);
</script>
</div>
<div class="col-6">
<div class="row font-weight-bold text-secondary" >&nbsp;<?php 
$nm = $fname." ".$lname; 
$sc = substr($nm,0,10).'';
echo $sc;

?>
</div>
<!-- <div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $ss; ?>"><?php  echo $rating; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $ss."%";?></div> -->
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div></div>
<div class="col-2">
<?php
$p = "";

$chk = "SELECT * FROM job_proposed WHERE staff_id = $id AND job_id = $jid AND hired = 1";
$carray = $conn->query($chk);
if ($carray->num_rows > 0) {
$p = 1;

}

{
?>

<?php if($ck == 1){?>
<a  href="#" data-toggle="tooltip" title="checked in!"  class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="hire<?php echo $id; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
<?php }else{ ?>

  <a  href="#" data-toggle="tooltip" title="not checked in!"  class="btn-floating btn-sm btn-danger z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="hire<?php echo $id; ?>"><i class="far fa-clock" aria-hidden="true"></i></a>


<?php } ?>

<script>

$("#hire<?php echo $id; ?>").click(function () {

    var ss<?php echo $id; ?> = $("#skillscore<?php echo $id; ?>").val();

   $.post("ajax/hirestaff.php?jid="+"<?php echo $jid; ?>"+"&staffemail="+"<?php echo $email; ?>"+"&ss="+"<?php  echo $ss; ?>"+"&contractstr="+"<?php echo $contractstr;?>"+"&contractor="+"<?php echo $contractor;?>"+"&jpid="+"<?php echo $id;?>", function(data) {  
   if (data === 1 || data === "1"){
  
   $("#hire<?php echo $id; ?>").addClass(" d-none");
    $("#hire<?php echo $id; ?>").removeClass("d-none");
   
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
 Command: toastr["success"]("", "HIRED SUCCESSFULLY") ;  
   
   
   
   }else{
   
   
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
 Command: toastr["error"]("", "ERROR ,try again later!") ;
   
   
   
   
   }
   });

});

</script>
<?php } ?>
</div>
</div>
</div>


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





<?php }}else{ ?>

      <div class="align-items-middle text-center center-text my-auto" style="margin-top: 50px !important;">
        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">NO HIRED EMPLOYEES</span>
  
      </div>
<?php } ?>
    </div>
    <!--/.Panel 2-->
</div>
<!-- Tab panels -->
</div>
</section>

<?php } ?>
