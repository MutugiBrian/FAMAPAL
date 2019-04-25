<?php 
include 'common.php';


if(isset($_POST['js'])){
$jid = $_POST['ji'];
$rate = $_POST['jrating'];
$edate = time();
$jq =  "UPDATE `jobs` SET `completed` = '1',`active` = '0',`rating` = $rate ,`enddate` = $edate WHERE `jobs`.`id` = $jid";
$jr = $conn->query($jq);
if($jr){
$re = "SELECT h.*,u.*,u.id AS userid FROM users u,hired h WHERE h.jobid = $jid AND h.checkedin = 1 AND u.id = h.employeeid";
$rea = $conn->query($re);
if ($rea->num_rows > 0) {
while($e = $rea->fetch_array()){

  $cr = $e['rating'];
  $empid = $e['userid'];
  $no = $e['p1'];
  $nm = $e['fname'];
  $ntr = $cr+$rate;
  $nr = $ntr/2;
  $nr = floor($nr * 2) / 2;

  $uhd = "UPDATE `hired` SET `completed` = '1' WHERE `hired`.`jobid` = $jid AND  `hired`.`employeeid` = $empid";
  $uhda = $conn->query($uhd);

  $ur = "UPDATE `users` SET `rating` = $nr WHERE `users`.`id` = $empid";
  $ura = $conn->query($ur);


  $to = "+254".$no;

$sms = 'Hallo '.strtoupper($nm).' , a job you were hired for has just been completed , open app to view payment.';


sendmessage($to,$sms);
$lid = $_SESSION["id"];


  $notify = "INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `notification_text`, `readat`, `updatedat`, `createdat`) 
VALUES (NULL, 'job completed', '$lid', '$empid', '$jid', 'Has ended this job you were hired for ', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$notarray = $conn->query($notify);




  }}
?>
<script type="text/javascript">
   window.location='?page=completejobs';
</script>

<?php }else{ ?>

  <script type="text/javascript">
   alert("<?php echo $jq; ?>");
</script>
<?php
}

}


?>
<?php if($_SESSION['utype'] == 1){ ?>
<!--Section: Author Box-->
<section class="pgs accordion md-accordion" style="border:2px solid <?php echo $tt; ?>;min-height:88vh;" id="accordionEx7">
   <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    active jobs
    </span>
    </h4>
    </div>


       

            <!-- Modal -->
<div class="modal fade" id="ratingmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">HOW WAS THIS JOB DONE ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center style="font-size: 35px;">
          <div id="star">
           <i id="r1"class="fa fa-star tt rs"> </i>
            <i id="r2" class="fa fa-star tt rs"> </i>
            <i id="r3" class="fa fa-star tt rs"> </i>
            <i id="r4" class="fa fa-star-half-full tt rs"> </i>
            <i id="r5" class="fa fa-star-o tt rs "> </i> 
          </div>

        <script type="text/javascript">
          $("#r1").click(function(){
            $(".rs").removeClass("fa-star");
            $(".rs").removeClass("fa-star-half-full");
            $(".rs").removeClass("fa-star-o");
             $(".rs").addClass("fa-star-o");
             $(this).removeClass("fa-star-o");
            $(this).addClass("fa-star");
            $("#cm").text("Very Poorly");
            $("#jrating").val(1);
          });

          $("#r2").click(function(){
            $(".rs").removeClass("fa-star");
            $(".rs").removeClass("fa-star-half-full");
            $(".rs").removeClass("fa-star-o");
             $(".rs").addClass("fa-star-o");
             $("#r1").removeClass("fa-star-o");
            $("#r1").addClass("fa-star");
              $("#r2").removeClass("fa-star-o");
            $("#r2").addClass("fa-star");
            $("#cm").text("Poorly");
            $("#jrating").val(2);
          });

           $("#r3").click(function(){
            $(".rs").removeClass("fa-star");
            $(".rs").removeClass("fa-star-half-full");
            $(".rs").removeClass("fa-star-o");
             $(".rs").addClass("fa-star-o");
             $("#r1").removeClass("fa-star-o");
            $("#r1").addClass("fa-star");
              $("#r2").removeClass("fa-star-o");
            $("#r2").addClass("fa-star");
             $("#r3").removeClass("fa-star-o");
            $("#r3").addClass("fa-star");
            $("#cm").text("Good");
            $("#jrating").val(3);
          });

            $("#r4").click(function(){
            $(".rs").removeClass("fa-star");
            $(".rs").removeClass("fa-star-half-full");
            $(".rs").removeClass("fa-star-o");
             $(".rs").addClass("fa-star-o");
             $("#r1").removeClass("fa-star-o");
            $("#r1").addClass("fa-star");
              $("#r2").removeClass("fa-star-o");
            $("#r2").addClass("fa-star");
             $("#r3").removeClass("fa-star-o");
            $("#r3").addClass("fa-star");
             $("#r4").removeClass("fa-star-o");
            $("#r4").addClass("fa-star");
            $("#cm").text("Very Good");
            $("#jrating").val(4);
          });

              $("#r5").click(function(){
            $(".rs").removeClass("fa-star");
            $(".rs").removeClass("fa-star-half-full");
            $(".rs").removeClass("fa-star-o");
             $(".rs").addClass("fa-star-o");
             $("#r1").removeClass("fa-star-o");
            $("#r1").addClass("fa-star");
              $("#r2").removeClass("fa-star-o");
            $("#r2").addClass("fa-star");
             $("#r3").removeClass("fa-star-o");
            $("#r3").addClass("fa-star");
             $("#r4").removeClass("fa-star-o");
            $("#r4").addClass("fa-star");
             $("#r5").removeClass("fa-star-o");
            $("#r5").addClass("fa-star");
            $("#cm").text("Excellently !");
            $("#jrating").val(5);
          });
        </script>


        </center>
        <center>
          <span class="my-1 text-secondary font-weight-bold" id="cm"> Quite Good </span> 
        </center>
      </div>
      <div class="modal-footer text-center">
       
      </div>
       <center>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CLOSE</button>
        <button type="button" id="ej" class="btn btn-primary btn-sm" style="background-color: <?php echo $tt; ?> !important;">DONE</button>
        </center>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#ej").click(function(){
    $("#js").click();
  });
</script>

<?php
$myid = $_SESSION['id'];
$ev = "SELECT * FROM jobs WHERE posted_by = $myid AND active = 1 AND completed = 0 ORDER BY post_date DESC";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
$i=0;
while($j = $evarray->fetch_array()){
$i = $i+1;
$jid = $j['id'];
$nm = $j['name']; 
$name = substr($nm,0,21).'';
?> 
<div class="">
<div class="card mx-2 my-2 py-auto z-depth-1" >

<div class="mr-3 mb-0" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse<?php echo $jid; ?>" aria-expanded="true" aria-controls="collapse<?php echo $jid; ?>">
<div class="row mr-1 my-1 pl-1"   >
<div class="col-4 pss align-middle py-auto">
<img class="rounded-circle img-fluid d-flex z-depth-1 squareimage my-auto" src="<?php echo $_SESSION['image']; ?>" alt="Generic placeholder image">
</div>
<div class="col-8 px-1">
<div class="row font-weight-bold" >&nbsp;
<i class="fas fa-hard-hat tt my-auto" aria-hidden="true"></i>&nbsp;<?php echo $name; ?></div>
<!-- <div class="row" ><i class="fa fa-certificate tt my-auto " style="margin-left:2px !important;"aria-hidden="true" ></i>&nbsp;<?php echo $j['title']; ?></div> -->
<div class="row ">&nbsp;&nbsp;<i class="fa fa-map-marker tt my-auto" aria-hidden="true"></i>&nbsp;<?php echo $j['city'].",".$j['country']; ?></div>
<div class="row ">&nbsp;<i class="fa fa-money tt my-auto" aria-hidden="true"></i>&nbsp;&nbsp;<span style="font-size:12px !important;margin-top:5px !important;" ><?php echo $j['pay_amount']." ".$j['pay_currency']."/".$j['pay_per']; ?></span></div>
</div>
</div>
</div>


<div class="dropdown dropleft"  style="position:absolute;top:0px !important;right:0px !important;font-size:20px !important;">
<i class="fa fa-ellipsis-v " id="dell<?php echo $jid; ?>" aria-hidden="true" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="position:absolute;top:5px !important;right:5px !important;"></i>
     <div class="dropdown-menu dropdown-secondary" id="jdd<?php echo $jid; ?>">
    <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit</a>
    <a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Delete</a>
    <a class="dropdown-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;Share</a>
  </div>
</div>





                <div id="collapse<?php echo $jid; ?>" class="collapse mt-0 pt-0 <?php if($i == 1){echo "show";}?>" role="tabpanel" aria-labelledby="heading<?php echo $jid; ?>" data-parent="#accordionEx7">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold tt">Description</span><br />
                        <?php echo $j['description']; ?></p>
                    </div>


                    <a type="button" id="end<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold" style="position:absolute;bottom:0px !important;right:130px !important;font-size:10px !important;background-color: <?php echo $tt; ?>;"><i class="fas fa-power-off"></i> END JOB</a>

<a type="button" id="hire<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold" style="position:absolute;bottom:0px !important;right:0px !important;font-size:10px !important;background-color: <?php echo $tt; ?>;width:120px;"><i class="fas fa-plus"></i> ADD STAFF</a>



                </div>

<script>
    $("#hire<?php echo $jid; ?>").click(
     function (){
      window.location='?page=hire&jid=<?php echo $jid;?>';
      }
    );
     $("#end<?php echo $jid; ?>").click(
     function (){
        $("#jrating").val(3.5);
        $("#ratingmodal").modal();
      /*window.location='?page=activejobs';*/
      $("#ji").val(<?php echo $jid; ?>);
      /*$("#js").click();*/

      }
    );
    </script>
                
</div> 
</div>
<script>
$("#dell<?php echo $jid; ?>").click(function (){
 $("#jdd<?php echo $jid; ?>").dropdown();
});
</script>

<?php }}else{?>



    <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;">

        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">NO ACTIVE JOBS YET<br /></span>
  
      </div>





<?php } ?>

<form id="jobstart" name="jobstart" method="POST" action="">
<input type="hidden" name="ji" id="ji">
<input type="hidden" name="jrating" id="jrating" value="3.5">
<button  class="d-none" type="submit" id="js" name="js"></button>
</form>
</section>
<!--Section: Author Box-->

<script>
$(document).ready(function() {
var cw = $(".pss").width();
$(".squareimage").css({"height":cw+"px"});
});
</script>


<?php }else if($_SESSION['utype'] == 2){ ?>


<!--Section: Author Box-->
<section class="pgs accordion md-accordion" style="border:2px solid <?php echo $tt; ?>;min-height:88vh;" id="accordionEx7">
   <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    active jobs
    </span>
    </h4>
    </div>

<?php
$myid = $_SESSION['id'];
$ev = "SELECT h.*,j.*,u.*,j.id as jidd,j.city AS jcity , j.country AS jcountry FROM hired h,jobs j,users u WHERE j.active = 1 AND h.employeeid = $myid AND h.completed = 0 AND j.id = h.jobid AND u.id = h.employerid";

$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($dets = $evarray->fetch_array()){
  $nm = $dets['bname']; 
  $image = $dets['image']; 
  $pay = $dets['pay_amount']; 
  $per = $dets['pay_per']; 
  $curr = $dets['pay_currency']; 
  $jidd  = $dets['jidd'];
   $jn = $dets['name']; 
   $sd = $dets['startdate'];
$name = substr($nm,0,16).'..';
$rating = $dets['rating'];
$uid = $dets['id']; 


  $sdate = $dets['startdate'];
  $startdate = date('D M j Y', $sdate);
    $starttime = date('H:i', $sdate);
    $jfrom = $startdate." ".$starttime.":00 GMT+0300 (East Africa Time)";

$jid = $jidd; 
$name = substr($nm,0,21).'';

?> 
<div class="mt-1">
<div class="card mx-2 my-2 py-auto z-depth-1" >

<div class="mr-3 mb-0" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse<?php echo $jid; ?>" aria-expanded="true" aria-controls="collapse<?php echo $jid; ?>">
<div class="row mr-1 my-1 pl-1"   >
<div class="col-4 pss align-middle py-auto">
<img class="rounded-circle img-fluid d-flex z-depth-0 squareimage my-auto" src="<?php echo $image; ?>" alt="Generic placeholder image">
</div>
<div class="col-8 px-1">
<div class="row font-weight-bold" >
<i class="fas fa-hard-hat text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $name; ?></div>
<div class="row" ><i class="fa fa-certificate text-secondary my-auto " style="margin-left:2px !important;"aria-hidden="true" ></i>&nbsp;<?php echo $dets['title']; ?></div>
<div class="row ">&nbsp;<i class="fa fa-map-marker text-secondary my-auto" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $dets['jcity'].",".$dets['jcountry']; ?></div>
<div class="row "><i class="fa fa-money text-secondary my-auto" aria-hidden="true"></i>&nbsp;<span style="font-size:10px !important;margin-top:5px !important;" ><?php echo $dets['pay_amount']." ".$dets['pay_currency']."/".$dets['pay_per']; ?></span></div>
</div>
</div>
</div>


<div class="dropdown dropleft"  style="position:absolute;top:0px !important;right:0px !important;font-size:20px !important;">
<i class="fa fa-ellipsis-v " id="dell<?php echo $jid; ?>" aria-hidden="true" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="position:absolute;top:5px !important;right:5px !important;"></i>
     <div class="dropdown-menu dropdown-secondary" id="jdd<?php echo $jid; ?>">
    <a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Delete</a>
    <a class="dropdown-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;Share</a>
  </div>
</div>


<a type="button" id="checkin<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold px-0" style="position:absolute;bottom:0px !important;right:0px !important;font-size:10px !important;height:20px !important;width:90px !important;padding-top:3px !important;background-color: <?php echo $tt; ?>;">DETAILS</a>


                <div id="collapse<?php echo $jid; ?>" class="collapse mt-0 pt-0" role="tabpanel" aria-labelledby="heading<?php echo $jid; ?>" data-parent="#accordionEx7">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold">Description</span><br />
                        <?php echo $dets['description']; ?></p>
                    </div>
                </div>

<script>
    $("#checkin<?php echo $jid; ?>").click(
     function (){
      window.location='?page=hire&jid=<?php echo $jid;?>';
      }
    );
    </script>
                
</div> 
</div>
<script>
$("#dell<?php echo $jid; ?>").click(function (){
 $("#jdd<?php echo $jid; ?>").dropdown();
});
</script>



<?php }}else{?>



  <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;">

        <i class="far fa-sad-tear mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">NO ACTIVE JOBS YET<br /></span>
  
      </div>






<?php } ?>
</section>
<!--Section: Author Box-->

<script>
$(document).ready(function() {
var cw = $(".pss").width();
$(".squareimage").css({"height":cw+"px"});
});
</script>
















<?php } ?>