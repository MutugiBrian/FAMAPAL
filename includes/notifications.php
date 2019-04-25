<?php 
error_reporting(0);
ini_set("display_errors", 0);
$user = $_GET['user'];
include 'common.php';

?>
<!-- Section: Social newsfeed v.1 -->
<div class="pgs">
     <section style="margin-top: 0px !important;margin-bottom: 0px !important;height:100% !important;width:100% !important;">
       <div class="nd"style="margin-bottom: 0px !important;" >
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    notifications
    </span>
    </h4>
    </div>

      <div class="mdb-feed mx-0 px-0">
      
      
<?php 
      
$tt = $_SESSION['id'];
$ty = $_SESSION['utype'];

$nn = time();
$sr= "UPDATE `notifications` SET `readat` = '$nn' WHERE `notifications`.`target_id` = $tt";
$sra=$conn->query($sr);
$gsi = "SELECT n.*,u.*,u.cname as pname,u.fname as pname,u.bname as pname FROM notifications n,users u WHERE target_id = $tt AND u.id=n.source_id";
    $gsa = $conn->query($gsi);
    if ($gsa->num_rows > 0) {
    while($g = $gsa->fetch_array()){
    $sid = $g['source_id'];
    $id = $g['notification_id'];
    $text = $g['notification_text'];
    $image = $g['image'];
    $bname = $g['bname'];
    $fname = $g['fname'];
    $cname = $g['cname'];
    $job_id = $g['job_id'];
    $jobstr = $g['jobstr'];
    $ca = $g['createdat'];
?>

        <!-- First news -->
        <div class="news mx-2 px-0" style="">

          <!-- Label -->
          <div class="label " style="height:60px !important;width:60px !important;">
            
             <div style="position:absolute;top:8px !important;left:8px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle img-fluid d-flex z-depth-1 squareimage my-auto" src="<?php echo $image; ?>" alt="Generic placeholder image" style="height:55px !important;width:55px !important;">


<script>
window.setInterval(function(){
var uid = "<?php echo $sid  ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej<?php echo $id; ?>").val(data);
$("#onlinej<?php echo $id; ?>").html(data);
});   
}, 5000);
</script>
          </div>

          <!-- Excerpt -->
          <div class="excerpt my-0 mx-1">

            <!-- Brief -->
            <div class="brief">
              <a class="name"><?php 
               if($bname != ""){
                echo $bname;
               }elseif($fname != ""){
                echo $fname;
               }else{
                 echo $cname;
               }?></a> <?php echo $text; ?><?php 
               if(isset($job_id) && $job_id>0){
               
    $jg = "SELECT * FROM jobs WHERE id = $job_id";
    $jga = $conn->query($jg);
    if ($jga->num_rows > 0) {
    while($j = $jga->fetch_array()){
    $jn = $j['name'];
    ?>
    <a class="name" id="apply<?php echo $job_id; ?>"><i class="fa fa-briefcase text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $jn; ?></a>
    
    <?php
    }
    } 
    
    if($ty == 3){
    
    ?>
   
    <script>
    $("#apply<?php echo $job_id; ?>").click(
     function (){
      window.location='?page=apply&jid=<?php echo $job_id;?>&by=<?php echo $tt;?>';
      }
    );
    </script>
    
    <?php }elseif($ty == 1){ ?>
    
    
      <script>
    $("#apply<?php echo $job_id; ?>").click(
      function (){
      window.location='?page=hire&jid=<?php echo $job_id;?>';
      }
    );
    </script>
    
    
    
    
    <?php 
    }           
    }
    
    if(isset($jobstr) && $jobstr != ""){
    
    
     $jg = "SELECT * FROM jobs WHERE uniquestr = '$jobstr'";
    $jga = $conn->query($jg);
    if ($jga->num_rows > 0) {
    while($j = $jga->fetch_array()){
    $jn = $j['name'];
    $job_id = $j['id'];
    ?>
    <a class="name" id="apply<?php echo $job_id; ?>"><i class="fa fa-briefcase text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $jn; ?></a>
   
   
 <?php 
    if($ty == 3){
    ?> 
    <script>
    $("#apply<?php echo $job_id; ?>").click(
     function (){
      window.location='?page=apply&jid=<?php echo $job_id;?>&by=<?php echo $tt;?>';
      }
    );
    </script>
    
    <?php }elseif($ty ==1){ ?>
    
    
     <script>
    $("#apply<?php echo $job_id; ?>").click(
      function (){
      window.location='?page=hire&jid=<?php echo $job_id;?>';
      }
    );
    </script>
    
    <?php
    
    }}
    }else{
    
    echo 'no result';
    } 
    }
    ?>
            </div>

            <!-- Feed footer -->
            <div class="feed-footer mb-0 mt-0 py-0">
              <?php  getp($ca); ?>
            </div>

          </div>
          <!-- Excerpt -->

        </div>
        
        <hr />                
        <!-- First news -->
<?php }}else{ ?>
 
     <?php // echo $tt; ?>

 
    <div class="align-items-middle text-center center-text my-auto" style="margin-top: 35% !important;">

        <i class="far fa-bell-slash mb-4" style="color:<?php echo $tt2; ?> !important;font-size: 80px;"></i>
        <br />
        <span style="">NO NOTIFICATIONS YET, CHECK BACK LATER.</span>
  
      </div>
     


   


<?php } ?>

      </div>
      <!-- Newsfeed -->


</section>
</div>
<!-- Section: Social newsfeed v.1 -->