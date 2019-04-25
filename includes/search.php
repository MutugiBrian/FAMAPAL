<?php
$key = $_GET['key'];
include 'common.php';


$q = 3;
if(isset($_GET['f'])){
$f = $_GET['f'];

}else{
$f = "";
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
    window.location='?page=search&key=<?php echo $key;?>';
  </script>
  <?php
 }
}





if(isset($_POST['qsub'])){

$jobid = $_POST['jobid'];
$empid =  $_POST['empid'];
$myid = $_SESSION['id'];




$ev = "SELECT * FROM queue WHERE employer = $empid AND employee = $myid AND deleted = 0";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
  $q =  2;
  $f = 'no' ;
 ?>
 <script type="text/javascript">
    window.location.href = '?page=search&key=<?php echo $key;?>&f=<?php echo $f;?>';
  </script>
  <?php
}else{
   
 $hquery = "INSERT INTO `queue` (`employee`, `employer`, `datecreated`, `id`) VALUES ($myid, $empid, CURRENT_TIMESTAMP, NULL)";
 $harray = $conn->query($hquery);
 if(!$harray){
  /*echo 0;*/
  $f = 'no' ;

  ?>
 <script type="text/javascript">
     window.location.href = '?page=search&key=<?php echo $key;?>&f=<?php echo $f;?>';
  </script>
  <?php
 }else{
   $f = 'yes' ;


//END OF SMS
  ?>
  <script type="text/javascript">
     window.location.href = '?page=search&key=<?php echo $key;?>&f=<?php echo $f;?>';
  </script>
  <?php
 }
}
}



if($f == "no"){

?>

<script type="text/javascript">
  $(window).ready(function(){
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
  Command: toastr["error"]("already queued");
  });
 
  </script>
<?php 
}elseif($f == "yes"){ ?>


  <script type="text/javascript">
  $(window).ready(function(){
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
  Command: toastr["success"]("queued successfully");
  });
 
  </script>





<?php
}

?>
<head>
</head>

<div class="pgs">

   <?php 
  if($f == 'yes' || $f == 'no'){ ?>
  <script type="text/javascript">
    window.setInterval(function(){
      window.location.href = '?page=search&key=<?php echo $key;?>&f=?';
  
}, 1000);
  </script>

<?php } ?>


<section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="margin-top: 0px !important;padding-top: 0px !important;border:2px solid <?php echo $tt; ?>;min-height:1000px !important;">

    <!--Section heading--> 
    
    <div class="nd"style="width:98%;margin-bottom: 0px !important;margin-right: 20px !important;" >
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    '<?php echo $key; ?>' SEARCH
    </span>
    </h4>

     
    </div>
    <div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >
    <script>
function goBack() {
    window.history.back();
}
</script>

<?php
if(isset($key) && $key != ""){
 if($_SESSION['utype'] == 2){ 
  //employee
  $sql = "SELECT j.* , u.* ,u.id as uid FROM jobs j, users u WHERE CONCAT(j.name, '', j.description, '') LIKE
   '%$key%' AND u.id = j.posted_by";

  $evarray = $conn->query($sql);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
  $jn = $dets['name']; 
    $jd = $dets['description']; 
  $nm = $dets['bname']; 
$name = substr($nm,0,19).'..';
$rating = $dets['rating'];
$uid = $dets['uid']; 
$city = $dets['city']; 
$country = $dets['country']; 
?>


<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp" > 
<div class="card z-depth-1 rounded-bottom">
<a onclick='mapmodal("<?php echo $nm; ?>","<?php echo $uid; ?>","<?php echo $dets['image']; ?>","<?php echo $rating; ?>")'>
<img class='card-img z-depth-0' src='<?php echo $dets['image']; ?>' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/></a>                
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;font-size: 20px;" class="mx-2 text-center" >

<?php

echo $name;
?>
 
</div>
<div class="lighten-3 text-center pt-0 rounded-bottom" style="font-size: 18px;">
<?php 

showrating($rating);
?>  
</div>
<hr class="mx-2 my-0">
<div class="" style="color:<?php echo $tt; ?> !important;font-size: 15px;">
    <i class="fas fa-hard-hat tt " style="font-size:17px;"></i>
  <?php echo $jn; ?>
</div>
<div  style="font-size: 15px;">
  <?php echo $jd; ?>
</div>
<hr class="mx-2 my-0">
<div class="" style="color:<?php echo $tt; ?> !important;font-size: 15px;">
    <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $city; ?>
</div>
<div  style="font-size: 15px;">
   <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $country; ?>
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   

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

}}else{
  $sr1 = 'nt';
}




  $sql = "SELECT * FROM users  WHERE CONCAT(bname, '', bnumber, '', btype, '',country, '', city, '', email, '',about, '') LIKE
   '%$key%' AND type = 1";


  $evarray = $conn->query($sql);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
  $b = $dets['bname']; 
    $jd = $dets['about']; 
  $city = $dets['city']; 
  $country = $dets['country']; 
$name = substr($b,0,19).'..';
$rating = $dets['rating'];
$uid = $dets['id']; 
?>


<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp" > 
<div class="card z-depth-1 rounded-bottom">
<a onclick='mapmodal("<?php echo $b; ?>","<?php echo $uid; ?>","<?php echo $dets['image']; ?>","<?php echo $rating; ?>")'>
<img class='card-img z-depth-0' src='<?php echo $dets['image']; ?>' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/></a>                
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;font-size: 20px;" class="mx-2 text-center" >

<?php

echo $b;
?>
 
</div>
<div class="lighten-3 text-center pt-0 rounded-bottom" style="font-size: 18px;">
<?php 

showrating($rating);
?>  
</div>
<hr class="mx-2 my-0">
<div class="" style="color:<?php echo $tt; ?> !important;font-size: 15px;">
    <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $city; ?>
</div>
<div  style="font-size: 15px;">
   <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $country; ?>
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   

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

}}else{
  $sr2 = 'nt';
}

if($sr1 == 'nt' && $sr2 == 'nt'){
  ?>


  <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;margin-left: 34% !important;">
<div style="margin-left: 40% !important;">
        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">OOPS, NOTHING WAS FOUND<br /></span>
</div>
      </div>





<?php
}
?>
  <!----EMPLOYEEE--->











<?php }else{

  //employer

    $sql = "SELECT * FROM users  WHERE CONCAT(fname, '',lname, '', p1, '', btype, '',country, '', city, '', email, '',about, '') LIKE
   '%$key%' AND type = 2";


  $evarray = $conn->query($sql);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
  $fn = $dets['fname']; 
    $ln = $dets['lname']; 
    $jd = $dets['about']; 
  $city = $dets['city']; 
  $country = $dets['country']; 
$name = $fn." ".$ln;
$rating = $dets['rating'];
$uid = $dets['id']; 
?>


<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp" > 
<div class="card z-depth-1 rounded-bottom">
<a onclick='mapmodal("<?php echo $name; ?>","<?php echo $uid; ?>","<?php echo $dets['image']; ?>","<?php echo $rating; ?>")'>
<img class='card-img z-depth-0' src='<?php echo $dets['image']; ?>' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/></a>                
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;font-size: 20px;" class="mx-2 text-center" >

<?php

echo $name;
?>
 
</div>
<div class="lighten-3 text-center pt-0 rounded-bottom" style="font-size: 18px;">
<?php 

showrating($rating);
?>  
</div>
<hr class="mx-2 my-0">
<div class="" style="color:<?php echo $tt; ?> !important;font-size: 15px;">
<center>
  <?php echo $jd; ?>
  </center>
</div>
<hr class="mx-2 my-0">
<div class="" style="color:<?php echo $tt; ?> !important;font-size: 15px;">
    <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $city; ?>
</div>
<div  style="font-size: 15px;">
   <i class="fas fa-map-marker-alt" style="font-size:17px;"></i>
  <?php echo $country; ?>
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   

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

}}else{
  //NOTHING RETURNED
  ?>


  <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;margin-left: 34% !important;">
<div style="margin-left: 40% !important;">
        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">OOPS, NOTHING WAS FOUND<br /></span>
</div>
      </div>




<?php
}
  ?>
  <!----EMPLOYER--->













































<?php } ?>


</div>
</div>
</section>
</div>

<?php }else{ ?>


   <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;margin-left: 34% !important;">
<div style="margin-left: 40% !important;">
        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">OOPS, NOTHING TO SEARCH<br /></span>
</div>
      </div>



<?php }?>


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
        <h6 id="rs"> </h6>
        <?php 
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

    


        <?php ?></div>

    </div>
    <!--/.Content-->
  </div>
</div>
  
<script type="text/javascript">
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