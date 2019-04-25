<?php 

$jid = $_GET['jid'];
$client = $_GET['by'];
$uid = $_SESSION['id'];


 $cs = "SELECT * FROM contracts WHERE job_id = $jid AND contractor_id = $uid"; 
    $csa = $conn->query($cs);
    if ($csa->num_rows > 0) {
    while($cs = $csa->fetch_array()){ 
      $cont = $cs['contstr'];  
       $_SESSION['cont'.$jid.''] = $cont;    
       
       $jname = $cs['name'];
       $jdesc = $cs['description']; 
       $contcut = $cs['contcut'];                                   
      
      
      }}

$ep = "";
$cont = "";
$exs = $_SESSION['cont'.$jid.''];
if(isset($_POST['contsub'])){


if(!$exs){
$jname = $_POST['jname'];
$contcut = $_POST['contcut'];
$jdesc = $_POST['jdesc'];
$contid = $_POST['contid'];
$jobid = $_POST['jobid'];
$unique = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

if($jname == "" || !$jname || $contcut == "" || !$contcut || $jdesc == "" || !$jdesc ){
$ep = 1;
}else{


$staffreg = "INSERT INTO `contracts` (`id`, `contstr`, `contractor_id`, `job_id`, `name`, `description`, `contcut`, `datecreated`, `dateupdated`) 
VALUES (NULL, '$unique', '$contid', '$jobid', '$jname', '$jdesc', '$contcut', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
$regarray = $conn->query($staffreg);
if ($regarray === TRUE){

$cont = 1;
 $_SESSION['cont'.$jid.''] = $unique;


}

}
}else{



}



}
?>

<style>

.wow {
  visibility: hidden;
}

</style>





<?php  if($cont == 1){?>

 <script>
            $(document).ready(function() {
             
             $("#contreg").find("input[type=text],input[type=tel],input[type=file],input[type=email],input[type=password], textarea").val("");
            
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
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["success"]("", "CONTRACT SET SUCCESSFULLY") ;                                     
            
            
            
            
                                                                          
            $('#centralModalSuccess').modal('toggle');
            });
            </script>
<?php } ?>


<?php  if($ep == 1){?>
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
 Command: toastr["error"]("Fill in all details and try again", "ERROR !") ;
});
</script> 
<?php } ?>

<?php 

$ev = "SELECT j.*,u.* FROM jobs j,users u WHERE u.id = $client AND j.id = $jid";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($j = $evarray->fetch_array()){
$unique = $j['uniquestr'];
$currency = $j['pay_currency'];
$jobpay = $j['pay_amount'];
$jpb = $j['posted_by'];
$_SESSION['jobpay'] =  $jobpay;
?>

<div class="sec px-1" style="margin-top:7%;background-color:#EFF3F4 !important;">
<!-- Classic tabs -->
<!-- Nav tabs -->
<ul class="nav nav-tabs md-tabs nav-justified purple">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">APPLY</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">DETAILS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">MESSAGE</a>
    </li>
</ul>
<!-- Tab panels -->
<div class="tab-content card">
    <!--Panel 1-->
    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
        <br>
        <p class="d-none"><?php echo $jid; ?><br /> <?php echo $client; ?><br /></p>
        
        <!-- Material form contact -->
<div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary"  style="border-width: 2px !important;background-color:#EFF3F4 !important;"> 
<div class="col-lg-4  col-md-4 col-6 rgba-white-strong mx-auto z-depth-0  btn btn-outline-secondary border-0 view"  style="height:auto !important;padding:0px !important;">
<div class="card-header  info-text text-uppercase font-weight-bold " style="background-color:white !important;margin-top:0px !important;">APPLY</div>  
</div> 

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" id="contreg" action="" method="POST">   
           <div id="details" class="animated fadeInLeft <?php 
           if(isset( $_SESSION['cont'.$jid.''])){
           echo "d-none";
           }
           
           ?>">
        
        <?php 
           if(isset( $_SESSION['cont'.$jid.''])){
           echo "<p class='text-success font-weight-bold'>CONTRACT -". $_SESSION['cont'.$jid.'']." DETAILS</p>";
           }else{
           
            echo "<p>set contract to propose staff.</p>";
           }
           
           ?>


            <!-- Name -->
            <div class="md-form mt-3">
                        <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Job Name/Title</label>
    <textarea class="form-control z-depth-1  ta" id="jname" name="jname" length="30"  maxlength="30" rows="3" placeholder="Enter job name here..." <?php 
           if(isset( $_SESSION['cont'.$jid.''])){
           echo "readonly";
           }
           ?>>
    <?php 
    if(!$jname){
    echo $j['name'];}else{ echo $jname;} ?>
    </textarea>
</div>
            </div>
            
            <input type="hidden" id="contid"  name="contid" value="<?php echo $_SESSION['id'];?>"/>
            <input type="hidden" id="jobid"  name="jobid" value="<?php echo $jid; ?>"/>

        
            
            <div>
            
                <div class="form-row">
        <!-- Grid column -->
        <div class="col">
             <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">YOUR CUT <span id="cutp" class="" style=""></span></label>
    <textarea class="form-control z-depth-1" id="contcut" name="contcut" length="30"  maxlength="30" rows="1" placeholder="Enter your cut..." onkeyup="checkInput(this)" <?php 
           if(isset( $_SESSION['cont'.$jid.''])){
           echo "readonly";
           }
           ?>><?php echo $contcut;?></textarea>
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
 Command: toastr["error"]("", "NUMBERS ONLY FOR THE CUT !") ;
 return false;
            
            
      }
      else{   
      
      var jobpay = "<?php echo $jobpay; ?>";
      var ip = ob.value;
     var percentg = ip/jobpay;
     var pp1 = percentg*100;
     var pp = pp1.toFixed(2);
     var fp = pp+"%";
     
     
      if( pp1 >= 100){
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

var test = ip;
var lastone = test.toString().split("").pop();
ob.value = ob.value.replace(lastone,"");
 Command: toastr["error"]("", "CUT MUST BE LESS THAN THE TOTAL PAY !") ;
 
 return false;
 }else{
     
     $("#cutp").empty();
     $("#cutp").html(fp);
     $("#cutp").removeClass("text-danger");
     $("#cutp").removeClass("text-success");
     
     if(percentg>0.6){
     $("#cutp").addClass("text-danger");
     }else{
       $("#cutp").addClass("text-success");
     }
     
     }
     
      
      
        
      
      
      
      }
}
    </script>
        <!-- Grid column -->

        <!-- Grid column -->
    <div class="col">
    <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">TOTAL PAY</label>
    <textarea class="form-control z-depth-1 border border-secondary font-weight-bold text-secondary mb-1" id="jcur" style="font-size:15px !important;" name="jcur" length="6"  maxlength="6" rows="1" value="<?php echo $_SESSION['currency'];?>" readonly><?php echo $jobpay." ".$currency;?></textarea>
    </div>
    </div>
    </div>
            
            
            </div>

            <!--Message-->
            <div class="md-form">
                 <div class="form-group shadow-textarea ">
    <label for="exampleFormControlTextarea6">Job Description</label>
    <textarea class="form-control z-depth-1 ta" name="jdesc" id="jdesc" length="200"  maxlength="200" rows="4" placeholder="Describe your job here..." <?php 
           if(isset( $_SESSION['cont'.$jid.''])){
           echo "readonly";
           }
           ?>>
    <?php echo $j['description']; ?>
    </textarea>
</div>
            </div>
            
            
            <button class="d-none" type="submit" name="contsub" id="contsub">SUBMIT</button>
               </form>

            <!-- Send button -->
            
            <?php 
            
           if(isset( $_SESSION['cont'.$jid.''])){
           
           ?>
           <center>
           <button class="btn btn-secondary btn-rounded   btn-block z-depth-0 my-4 waves-effect  font-weight-bold" id="bk" style="width:50% !important;">BACK</button>
           </center>
           <?php
           }else{
           ?>
           <center>
            <button class="btn btn-secondary btn-rounded   btn-block z-depth-0 my-4 waves-effect  font-weight-bold" id="continue" style="width:50% !important;">DONE</button>
            </center>
            <?php } ?>
            
            
            </div>
            
            
            
               <div id="propose" class="wow fadeInRight <?php 
                if(isset( $_SESSION['cont'.$jid.''])){
          
           }else{
             echo "d-none";
           } ?>">
        <p class="text-center">Propose Staff. <br /><span class="text-secondary z-depth-0 my-4 waves-effect  ml-0 mt-0" id="back" ><i class="fa fa-rotate-left" aria-hidden="true"></i>&nbsp;review contract</span></p>


           
           
           
          <?php

$cid = $_SESSION['cid'];
$evk = "SELECT * FROM users WHERE type = 2 AND cid = '$cid'";
$evarrayk = $conn->query($evk);
if ($evarrayk->num_rows > 0) {
while($k = $evarrayk->fetch_array()){
$fname = $k['fname']; 
$lname = $k['lname'];
$image = $k['image'];  
$email = $k['email']; 
$rating = $k['rating']; 
$id = $k['id']; 

//$name = substr($nm,0,21).'';

?> 
<div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-0 my-2 py-auto" >

<div class="mr-3 mb-0"  >
<div class="row mr-1 my-0 pl-1"   >
<div class="col-4 pss align-middle">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $id; ?>">
    </div>
<img class="rounded-circle z-depth-1 mt-1 mb-1" src="<?php echo $image; ?>" style="height:55px !important;width:55px !important;" alt="Generic placeholder image">


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
<?php  
$uniq = $j['uniquestr'];
$sss = skillscore($uniq,$email);

?></div>
<div class="d-none" id="skillscore<?php echo $id; ?>" value="<?php  echo $sss; ?>"><?php  echo $sss; ?></div>
<div class="row text-success font-weight-bold" style="font-size:13px;">&nbsp;SKILLSCORE : <?php echo $sss."%";?></div>
<div class="row font-weight-bold" style="font-size:13px;">&nbsp;<?php showrating($rating); ?> &nbsp;&nbsp; </div></div>
<div class="col-2">
<?php
$p = "";

$chk = "SELECT * FROM job_proposed WHERE staff_id = $id AND job_id = $jid";
$carray = $conn->query($chk);
if ($carray->num_rows > 0) {
$p = 1;

}

{
?>


<a class="btn-floating btn-sm btn-success z-depth-0 mx-auto <?php if($p == 1){echo "d-none";}?>" id="propose<?php echo $id; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>


<div class="btn-floating btn-sm z-depth-0 mx-auto text-success font-weight-bold <?php if($p != 1){echo "d-none";}else{}?>" id="proposed<?php echo $id; ?>"><i class="fa fa-check text-success" aria-hidden="true"></i></div>


<script>

$("#propose<?php echo $id; ?>").click(function () {

    var ss<?php echo $id; ?> = $("#skillscore<?php echo $id; ?>").val();

   $.post("ajax/proposestaff.php?jid="+"<?php echo $jid; ?>"+"&staffid="+"<?php echo $id; ?>"+"&ss="+"<?php  echo $sss; ?>"+"&contract="+"<?php echo $_SESSION['cont'.$jid.''];?>"+"&contractor="+"<?php echo $_SESSION['id'];?>"+"&jpb="+"<?php echo $jpb; ?>", function(data) {  
   
  
   $("#propose<?php echo $id; ?>").addClass(" d-none");
    $("#proposed<?php echo $id; ?>").removeClass("d-none");
   
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
 Command: toastr["success"]("", "PROPOSED SUCCESSFULLY") ;  
   
   
   
   
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



<?php }} ?> 
           
           
           
           
           
           
           
           
           
            <!-- Send button -->
            <center>
            <a href="?page=home" class="btn btn-secondary btn-rounded   btn-block z-depth-0 my-4 waves-effect  font-weight-bold" type="submit" style="width:50% !important;">DONE</a>
            </center>
            
            
            </div>

     
        <!-- Form -->
        <script>
        
        $("#bk").click(function (e){
        
        e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            $("#details").addClass("d-none");
             $("#propose").removeClass("d-none");
         
        
        });
        $("#continue").click(function (e){
        
         e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
        
        var jname = $("#jname").val();
        var contcut = $("#contcut").val();
        var jdesc = $("#jdesc").val();
        
        if(jname === "" || jname === null){
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
 Command: toastr["error"]("", "Enter job name to continue !") ;
 $("#jname").addClass("border border-danger");
        
        }
        else if(contcut === "" || contcut === null){
        $("#jname").removeClass("border border-danger");
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
 Command: toastr["error"]("", "Select your cut to continue !") ;
        
        
        }
else if(jdesc === "" || jdesc === null){
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
 Command: toastr["error"]("", "Enter job description to continue !") ;
 $("#jdesc").addClass("border border-danger");
        
        }else{
         $("#jname").removeClass("border border-danger");
         $("#jdesc").removeClass("border border-danger");
         $("#contsub").click();
         
        
        
        
        
        }
        
        
        });
        
        
        $("#back").click(function (e){
        
         e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
             $("#propose").addClass("d-none");
         $("#details").removeClass("d-none");
            });
        </script>

    </div>

</div>
<!-- Material form contact -->
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane fade" id="panel2" role="tabpanel">
        <br>
       <!-- Section: Blog v.1 -->
       
       
       
<section class="my-2">

  <div class="card card-cascade card-ecommerce narrower m-1 mt-2 mt-5 z-depth-0 border border-secondary row"  style="border-width: 2px !important;background-color:#EFF3F4 !important;"> 
<div class="col-lg-4  col-md-4 col-6 rgba-white-strong mx-auto z-depth-0  btn btn-outline-secondary border-0 view"  style="height:auto !important;padding:0px !important;">
<div class="card-header  info-text text-uppercase font-weight-bold " style="background-color:white !important;margin-top:0px !important;">DETAILS</div>  
</div> 
    <!-- Grid column -->

    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <h5 class="font-weight-bold mb-3 text-success text-center"><strong><i class="fa fa-briefcase pr-2"></i><?php echo $j['name']; ?></strong></h5>
      <!-- Excerpt -->
      <p><?php echo $j['description']; ?></p>
      <!-- Post data -->
      <p>by <a><strong><?php echo $j['bname']; ?></strong></a>,<?php echo $j['post_date']; ?></p>
      <!-- Read more button -->
          <div class="col-lg-5">

      <!-- Featured image -->
      <div class=" rounded z-depth-1 mb-lg-0 mb-2">
       <!--Google map-->
<div id="map-container" class="z-depth-1" style="height: 300px"></div>

<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js?key=<?php echo $gmapkey; ?>"></script>
<script>
function regular_map() {
var var_location = new google.maps.LatLng(<?php echo $j["job_lat"]; ?>, <?php echo $j["job_long"]; ?>);

var var_mapoptions = {
center: var_location,
zoom: 14
};

var var_map = new google.maps.Map(document.getElementById("map-container"),
var_mapoptions);

var var_marker = new google.maps.Marker({
position: var_location,
map: var_map,
label: "JOB LOCATION",
title: "JOB LOCATION"
});
}

google.maps.event.addDomListener(window, 'load', regular_map);
</script>
      </div>

    </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">



</section>
<!-- Section: Blog v.1 -->







    </div>
    <!--/.Panel 2-->
    <!--Panel 3-->
    <div class="tab-pane fade" id="panel3" role="tabpanel">
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
            reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
            porro voluptate odit minima.</p>
    </div>
    <!--/.Panel 3-->
</div>
</div>
<?php

}}

?>


