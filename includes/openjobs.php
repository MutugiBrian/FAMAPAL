<!--Section: Author Box-->
<?php 
include 'common.php';

if(isset($_POST['js'])){
$jid = $_POST['ji'];
$jq =  "UPDATE `jobs` SET `active` = '1' WHERE `jobs`.`id` = $jid";
$jr = $conn->query($jq);
if($jr){
?>
<script type="text/javascript">
   window.location='?page=activejobs';
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
<section class="pgs  accordion md-accordion" style="border:2px solid <?php echo $tt; ?>;min-height:88vh;" id="accordionEx7">
   <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    open jobs
    </span>
    </h4>
    </div>

<?php
$myid = $_SESSION['id'];
$ev = "SELECT j.*,(SELECT COUNT(*) FROM hired WHERE employerid = $myid) AS he FROM jobs j WHERE posted_by = $myid AND active = 0 AND completed = 0 ORDER BY post_date DESC";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
$i = 0;
while($j = $evarray->fetch_array()){
$i = $i+1;
$jid = $j['id'];
$nm = $j['name']; 
$he = $j['he']; 
$name = substr($nm,0,21).'';

?> 
<div class="mt-1">
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

<?php 
if($he > 0){
?>


                <div id="collapse<?php echo $jid; ?>" class="collapse mt-0 pt-0 <?php if($i == 1){echo "show";}?>" role="tabpanel" aria-labelledby="heading<?php echo $jid; ?>" data-parent="#accordionEx7">
                    <div class="card-body mb-1 mt-0 pt-0">
                    <hr />
                    
                        <p>
                        <span class=" text-left tt font-weight-bold">Description</span><br />
                        <?php echo $j['description']; ?></p>
                    </div>

                    <a type="button" id="start<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold" style="position:absolute;bottom:0px !important;right:90px !important;font-size:10px !important;background-color: <?php echo $tt; ?>;">START JOB</a>
<?php
}
?>
<a type="button" id="hire<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold" style="position:absolute;bottom:0px !important;right:0px !important;font-size:10px !important;background-color: <?php echo $tt; ?>;width:80px;">HIRE</a>


                </div>

<script>
    $("#hire<?php echo $jid; ?>").click(
     function (){
      window.location='?page=hire&jid=<?php echo $jid;?>';
      }
    );
    $("#start<?php echo $jid; ?>").click(
     function (){

      /*window.location='?page=activejobs';*/
      $("#ji").val(<?php echo $jid; ?>);
      $("#js").click();

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
        <span style="">NO OPEN JOBS <br />PLEASE CREATE A JOB</span>
  
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

<form id="jobstart" name="jobstart" method="POST" action="">
<input type="hidden" name="ji" id="ji">
<button  class="d-none" type="submit" id="js" name="js"></button>
</form>


<?php }else if($_SESSION['utype'] == 2){ ?>


<!--Section: Author Box-->
<section class="pgs accordion md-accordion" style="border:2px solid <?php echo $tt; ?>;min-height:88vh;" id="accordionEx7">
   <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    open jobs
    </span>
    </h4>
    </div>

<?php
$myid = $_SESSION['id'];
$ev = "SELECT h.*,j.*,u.*,j.id as jidd,j.city AS jcity , j.country AS jcountry FROM hired h,jobs j,users u WHERE j.active = 0 AND h.employeeid = $myid AND h.completed = 0 AND j.id = h.jobid AND u.id = h.employerid";

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


<a type="button" id="checkin<?php echo $jid; ?>"class="btn btn-sm z-depth-1 font-weight-bold px-0" style="position:absolute;bottom:0px !important;right:0px !important;font-size:15px !important;height:30px !important;width:100px !important;padding-top:3px !important;background-color: <?php echo $tt; ?>;">CHECK-IN</a>


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
        <span style="">NO OPEN JOBS YET<br /></span>
  
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