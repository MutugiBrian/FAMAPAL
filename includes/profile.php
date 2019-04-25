<style>

  input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;     
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";   
  }   
</style>

<?php 
$nodets = "";
$regs= "";

if(isset($_POST['avsub'])){

$fromd = $_POST['from'];
$tod = $_POST['to'];
$uid = $_SESSION['id'];

if($fromd != "" && $tod != "" ){
$from = strtotime($fromd);
$to = strtotime($tod);

$avchange = "UPDATE `users` SET `avstart` = '$from', `avend` = '$to' WHERE `users`.`id` = $uid";
$avarray = $conn->query($avchange);

$regs = 1;




}else{

$nodets = 1;


}








}

?><!--Carousel Wrapper-->
 <!--Projects section v.2-->
 
 
<?php 
if ($nodets == 1){
?>

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
  "hideDuration": 300,
  "timeOut": 2000,
  "extendedTimeOut": 300,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("", "Fill in FROM and TO !") ;
 });


</script>




<?php } ?>     


<?php 
if ($regs == 1){
?>

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
  "showDuration": 100,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["success"]("", "AVAILABILITY SET SUCCESSFULLY") ;   
 });


</script>




<?php } ?>  
<div class="pgs form-gradient text-center">
<section class="pt-2 px-1" style="background-color:#EFF3F4 !important;">
  
        <!--Section heading-->
        
        
        <div class="mt-2">
        <ul class="nav nav-tabs md-tabs nav-justified purple font-weight-bold" id="myTabJust" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">My Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="false">Set Availability</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#contact-just" role="tab" aria-controls="contact-just" aria-selected="false">Update Profile</a>
  </li>
</ul>
<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show  z-depth-0 active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
     <div class="card z-depth-0 testimonial-card">

      <!--Grid column-->
            <div class="testimonial">
                <!--Avatar-->
                <center>
         <img src="<?php if(@$_SESSION["id"]>0){ echo $_SESSION["image"]; }else{ echo "./uploads/sidelogo.png";}?> " class="logo-wrapper rounded-circle border-1 border border-secondary z-depth-1 my-2 p-1" style="height:130px !important;width:130px !important;<?php if(@$_SESSION["id"]>0){ echo "border-width:2px !important;"; }?> " >
    </center>
                       <?php
$ut = $_SESSION['utype'];
if($ut == 2){
 ?> 
                <!--Content-->
                <h5 class="mb-3 secondary-text text-secondary font-weight-bold">
                    <strong><?php echo $_SESSION['username']." ".$_SESSION['lname']; ?></strong>
                </h5>
                <h6 class="mb-3 font-weight-bold blue-text"><?php 
                $indid = $_SESSION['industry']; 
                $getind = "SELECT name FROM industries WHERE id = $indid";
                 $iarray = $conn->query($getind);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iname = $row['name'];  
    echo $iname;    
    }}
                ?></h6>
                
                
        
                <p style="font-size:15px;">
                <?php 
                
                        $ue = $_SESSION['email']; 
                $getsk = "SELECT * FROM staff_skills WHERE staff_email = '$ue'";
                 $iarray = $conn->query($getsk);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    
    $skid = $row['skill_id'];  
   $getskn = "SELECT * FROM skills WHERE id = $skid";
                 $iarrayn = $conn->query($getskn);
    if ($iarrayn->num_rows > 0) {while($row2 = $iarrayn->fetch_array()){
    $skin = $row2['name'];  
    
    echo "-".$skin."<br />";    
    }}   
    }}
                
                ?>
                </p>
                
                <?php
                }elseif($ut == 3){
                ?>
                
                
                <!--Content-->
                <h4 class="mb-3 secondary-text text-secondary font-weight-bold">
                    <strong><?php echo $_SESSION['username']; ?></strong>
                </h4>
                <h6 class="mb-3 font-weight-bold blue-text"><?php 
                $indid = $_SESSION['industry']; 
                $getind = "SELECT name FROM industries WHERE id = $indid";
                 $iarray = $conn->query($getind);
                if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
                $iname = $row['name'];  
                echo $iname;    
                }}
                ?></h6>
                
                  <p style="font-size:15px;">
                <?php 
                
                 $cid = $_SESSION['cid']; 
                $getr = "SELECT count(*) as ronins FROM users WHERE cid = '$cid'";
                 $iarray = $conn->query($getr);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $rs = $row['ronins']; 
          if($rs>1){
          
          echo $rs." RONINS";
          }else{
           echo "NO RONIN RECRUITED !";
          }
     
    }}
                
                ?>
                </p>
                
                
                
                
                
                <?php } ?>

                <!--Review-->
                <?php 
$rating = $_SESSION['rating'];
showrating($rating);
?>
            </div>
        <!--Grid column-->

    </div>            
    
    </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
     <!-- Material form register -->
<div class="wow fadeInUp border border-secondary rounded" style="border-width:2px !important;">


    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="" method="POST">
        
        <p class="mt-2">SET THE PERIOD FOR AVAILABILITY</p>

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                        <div class="md-form">
  <input placeholder="Select FROM" type="date" id="from" name="from" class="form-control datepicker">
</div>
               
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input placeholder="Select TO" type="date" id="to" name="to" class="form-control datepicker">
                    </div>
                    
                </div>
            </div>
            
            <button class="d-none" type="submit" name="avsub" id="avsub">avsub</button>

            <!-- E-mail -->
             <center>
            <button class="btn btn-secondary btn-rounded   btn-block z-depth-0 my-4 waves-effect  font-weight-bold" style=" !important;" id="dn">SET AVAILABILITY</button>
            </center>
            


            <hr>

        </form>
        <!-- Form -->
        
        <script>
        $("#dn").click(
        function (e){
         e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
        var from = $("#from").val();
        var tto = $("#to").val();
        
        if(from === "" || from === null){
        
        
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
  "timeOut": 2000,
  "extendedTimeOut": 300,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("", "Input start date!") ;
 $("#from").addClass("invalid");
        
        
        }
        else if(tto === "" || tto === null){
        
        
        
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
  "timeOut": 2000,
  "extendedTimeOut": 300,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("", "Input end date!") ;
 $("#from").removeClass("invalid");
 $("#to").addClass("invalid");
        
        
        }else{
         $("#from").removeClass("invalid");
          $("#to").removeClass("invalid");
          $("#avsub").click();
        
        
        }
        
        
        
        
        
        }
        );
        
        </script>

    </div>

</div>
<!-- Material form register --></div>
  <div class="tab-pane fade" id="contact-just" role="tabpanel" aria-labelledby="contact-tab-just">
  <div class=" border border-secondary px-2 rounded" style="border-width:2px !important;">
     <form id="contact-form" name="contact-form" action="mail.php" class="wow fadeInUp "method="POST">
                  <div class="row">
                  <div class="col-md-8">  
                <!--Grid row-->
                <div class="row">
               <!--Grid column-->
                    <div class="col-md-4  wow fadeInUp">
                        <div class="md-form">
                            <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $_SESSION['username']?>">
                            <label for="name" class="">First Name</label>
                        </div>
                    </div>
                    <!--Grid column-->
                    
                     <!--Grid column-->
                    <div class="col-md-4 wow fadeInUp">
                        <div class="md-form">
                            <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $_SESSION['lname']?>">
                            <label for="name" class="">Last Name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                   

                </div>
                
                 <div class="row">
             
                
                    <!--Grid column-->
                    <div class="col-md-4 wow fadeInUp">
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $_SESSION['p1']?>">
                            <label for="name" class="">Phone 1</label>
                        </div>
                    </div>
                    <!--Grid column-->
                    
                     <!--Grid column-->
                    <div class="col-md-4 wow fadeInUp">
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $_SESSION['p2']?>">
                            <label for="name" class="">Phone 2</label>
                        </div>
                    </div>
                    <!--Grid column-->

                

                </div>
               
                <!--Grid row-->

              
               

                <!--Grid row-->
                <div class="row">
                
                <div class="col-md-6 wow fadeInUp"> 
                         <select class="mdb-select colorful-select dropdown-secondary" id="industryselect" name="industryselect">
                <option value="" disabled>Choose your Industry</option>
      <?php 
    
    $industries = "SELECT * FROM industries";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];    
    $iname = $row['name']; 
    ?> 
       <option value="<?php echo $iid;?>" <?php 
         if($iid == $_SESSION['industry']){
           echo "selected";
         }
       ?>><?php echo $iname;?></option>
    <?php
    }}
    ?>
</select>
<label>INDUSTRY</label>
</div>

                    <!--Grid column-->
                    <div class="col-md-6 wow fadeInUp">   
                    
                    
                    
<select class="mdb-select colorful-select dropdown-secondary" style="text-align:center;"multiple searchable="Search Skill.." id="skillselect" name="skillselect[]">
    <option value="" disabled selected>Select Industry First</option> 
</select> 
<label>SKILLS</label>
            
                

                    </div>
                </div>
                 </div>
                 <div class="col-md-4 wow fadeInUp"> 
                 
                
                    
                 
                 

    <div class="file-field big wow fadeInUp">
<div class="container" >
    <div class="form-group" >
    <div class="file-field big" >
        <a class="btn-floating btn-lg purple lighten-1 mt-0 float-left" >
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <input type="file" accept="image/*" id="imgInp" >
        </a>
        <div class="file-path-wrapper">
           <input class="file-path validate"  type="text" placeholder="Update Profile Photo" readonly="readonly">
        </div>  
    </div>         

                                       
    
       
        <img id='img-upload'/>
    </div>
</div> 
</div>
    <div class="file-field big wow fadeInUp">
<div class="container" >
    <div class="form-group" >
    <div class="file-field big" >
        <a class="btn-floating btn-lg purple lighten-1 mt-0 float-left" >
        <i class="fa fa-paperclip" aria-hidden="true"></i>
            <input type="file" accept="application/pdf, application/vnd.ms-excel" >
        </a>
        <div class="file-path-wrapper">
           <input class="file-path validate"  type="text" placeholder="Update CV">
        </div>
    </div>
    </div>
</div> 
</div>



              
                
                
                
                 
                 </div>    
                 </div>                 
                <!--Grid row-->     

            </form>
            </div>
            <div class="center-on-small-only">
                <a class="btn btn-secondary wow fadeInUp" onclick="document.getElementById('contact-form').submit();"> UPDATE DETAILS </a>
            </div>
            <div class="status"></div>
  
  </div>
</div>
</div>
           
             
            
            <!--Section description-->
            <div class="d-none" style="">

   <ul class="nav classic-tabs tabs-purple " style="border-radius:0px;"id="dashul" align="center" role="tablist">

        <li class="nav-item">
             <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab"><i class="fa fa-lock " aria-hidden="true"></i><br>AVAILABILITY</a>
        </li>
         <li class="nav-item">
            <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab"><i class="fa fa-pencil-square-o " aria-hidden="true"></i><br>Update Profile</a>
        </li>
         
    </ul>

<!-- Tab panels -->
<div class="tab-content card z-depth-0 scrollbar scrollbar-night-fade thin" style="height:500px;overflow-y:scroll;">

    <!--Panel 1-->
    <div class="tab-pane fade in show active" id="panel51" role="tabpanel">
     
    
    
    </div>
    <!--/.Panel 1-->

    <!--Panel 2-->
    <div class="tab-pane fade" id="panel52" role="tabpanel">
 
    
    
    
    
    </div>
    <!--/.Panel 2-->

    <!--Panel 3-->
    <div class="tab-pane fade px-0 py-0" id="panel53" role="tabpanel">
    
    
    
    
    
   <div class="" style="padding:0px !important;background-color:#EFF3F4 !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important;background-color:#EFF3F4 !important; " id="accordionEx7" >


<?php

$ev = "SELECT j.*,u.image,u.bname FROM jobs j,users u WHERE u.id = j.posted_by LIMIT 10";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($j = $evarray->fetch_array()){
$myid = $j['posted_by'];
$image = $j['image'];
$client = $j['bname'];
$jid = $j['id'];
$nm = $j['name']; 

$name = substr($nm,0,21).'';

?> 
<div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-2 my-2 py-auto" >

<div class="mb-0" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse<?php echo $jid; ?>" aria-expanded="true" aria-controls="collapse<?php echo $jid; ?>">
<div class="row  my-1 "   >
<div class="col-4 pss align-middle py-auto">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej<?php echo $jid; ?>">
    </div>
<img class="rounded-circle img-fluid d-flex z-depth-1 squareimage my-auto" src="<?php echo $image; ?>" alt="Generic placeholder image">


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
<div class="col-8 px-1" style="font-size:13px;">
<div class="row font-weight-bold" >
<i class="fa fa-briefcase text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $name; ?></div>
<div class="row ">&nbsp;<i class="fa fa-map-marker text-secondary my-auto" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $j['city'].",".$j['country']; ?></div>
<div class="row ">&nbsp;<i class="fa fa-clock-o text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $j['post_date']; ?></div>
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


                <div id="collapse<?php echo $jid; ?>" class="collapse mt-0 pt-0" role="tabpanel" aria-labelledby="heading<?php echo $jid; ?>" data-parent="#accordionEx7">
                    <div class="card-body mb-1 mt-0 pt-0" style="font-size:13px;">
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
    <!--/.Panel 3-->

    <!--Panel 4-->
    <div class="tab-pane fade" id="panel54" role="tabpanel">
    
    
    
    
    <!-- Material form register -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>SET YOUR AVAILABILITY</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName">FROM</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="email" id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName">TO</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control">
                <label for="materialRegisterFormEmail">SELECT AVAILABILITY</label>
            </div>


            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">DONE</button>


            <hr>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
      <div class="tab-pane fade" id="panel56" role="tabpanel">
     
           
   <div class="" style="padding:0px !important;background-color:#EFF3F4 !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important;background-color:#EFF3F4 !important; " id="accordionEx72" >


<?php

$ev = "SELECT j.*,u.image,u.bname FROM jobs j,users u WHERE u.id = j.posted_by LIMIT 10";
$evarray = $conn->query($ev);
if ($evarray->num_rows > 0) {
while($j = $evarray->fetch_array()){
$myid = $j['posted_by'];
$image = $j['image'];
$client = $j['bname'];
$jid = $j['id'];
$nm = $j['name']; 

$name = substr($nm,0,21).'';

?> 
<div class="mt-1 col-md-4 mx-0 px-0 wow fadeInUp">
<div class="card mx-2 my-2 py-auto" >

<div class="mb-0" data-toggle="collapse" data-parent="#accordionEx7" href="#collapse2<?php echo $jid; ?>" aria-expanded="true" aria-controls="collapse<?php echo $jid; ?>">
<div class="row  my-1 "   >
<div class="col-4 pss align-middle py-auto">
 <div style="position:absolute;top:2px !important;right:20px !important;padding-top:0px !important;" id="onlinej2<?php echo $jid; ?>">
    </div>
<img class="rounded-circle img-fluid d-flex z-depth-1 squareimage my-auto" src="<?php echo $image; ?>" alt="Generic placeholder image">


<script>
window.setInterval(function(){
var uid = "<?php echo $myid ; ?>";
$.post("ajax/getstatus.php?id="+uid, function(data) {
$("#onlinej2<?php echo $jid; ?>").val(data);
$("#onlinej2<?php echo $jid; ?>").html(data);
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
<div class="col-8 px-1" style="font-size:13px;">
<div class="row font-weight-bold" >
<i class="fa fa-briefcase text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $name; ?></div>
<div class="row ">&nbsp;<i class="fa fa-map-marker text-secondary my-auto" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $j['city'].",".$j['country']; ?></div>
<div class="row ">&nbsp;<i class="fa fa-clock-o text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $j['post_date']; ?></div>
<div class="row "><i class="fa fa-money text-secondary my-auto" aria-hidden="true"></i>&nbsp;<?php echo $j['pay_amount']." ".$j['pay_currency']."/".$j['pay_per']; ?></div>
</div>
</div>
</div>


<div class="dropdown dropleft"  style="position:absolute;top:0px !important;right:0px !important;font-size:20px !important;">
<i class="fa fa-ellipsis-v " id="dell2<?php echo $jid; ?>" aria-hidden="true" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false" style="position:absolute;top:5px !important;right:5px !important;"></i>
     <div class="dropdown-menu dropdown-secondary" id="jdd2<?php echo $jid; ?>">
    <a id="apply<?php echo $jid; ?>" class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Apply</a>
    <a class="dropdown-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp;&nbsp;Share</a>
    <a class="dropdown-item" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;&nbsp;Favourite</a>
    
    <script>
    $("#apply2<?php echo $jid; ?>").click(
     function (){
      window.location='?page=apply&jid=<?php echo $jid;?>&by=<?php echo $myid;?>';
      }
    );
    </script>
  </div>
</div>


                <div id="collapse2<?php echo $jid; ?>" class="collapse mt-0 pt-0" role="tabpanel" aria-labelledby="heading2<?php echo $jid; ?>" data-parent="#accordionEx72">
                    <div class="card-body mb-1 mt-0 pt-0" style="font-size:13px;">
                    <hr />
                    
                        <p>
                        <span class=" text-left text-secondary font-weight-bold">Job Description</span><br />
                        <?php echo $j['description']; ?></p>
                    </div>
                </div>
                
</div> 
</div>
<script>
$("#dell2<?php echo $jid; ?>").click(function (){
 $("#jdd2<?php echo $jid; ?>").dropdown();
});
</script>



<?php }} ?>

               
</div>
</div>   
    
    
    
    
    
    
    
    
    
    
      
    </div>
    <!--/.Panel 4-->
    

</div>
</div> 



</div>

        </section>
        </div>
        <!--/Projects section v.2-->
        <hr>

        <!--Pagination dark-->
        <!--/Pagination dark-->

    
    
    
  
       <script>
       $('#flip').on('click', function(e) {
       document.getElementById("fbtn").style.display = "none";
	e.preventDefault();
	
	$('#card').toggleClass('flipped');
});
     </script>
       <script>
       $('#flip2').on('click', function(e) {
      
	e.preventDefault();
	
	$('#card').toggleClass('flipped');
   document.getElementById("fbtn").style.display = "block";
});
     </script>
     
        <script>
       $('#flipb').on('click', function(e) {
       document.getElementById("fbtnb").style.display = "none";
	e.preventDefault();
	
	$('#cardb').toggleClass('flipped');
});
     </script>
       <script>
       $('#flip2b').on('click', function(e) {
      
	e.preventDefault();
	
	$('#cardb').toggleClass('flipped');
   document.getElementById("fbtnb").style.display = "block";
});
     </script>
     
     
             <script>
       $('#flipc').on('click', function(e) {
       document.getElementById("fbtnc").style.display = "none";
	e.preventDefault();
	
	$('#cardc').toggleClass('flipped');
});
     </script>
       <script>
       $('#flip2c').on('click', function(e) {
      
	e.preventDefault();
	
	$('#cardc').toggleClass('flipped');
   document.getElementById("fbtnc").style.display = "block";
});
     </script>
    <script>
    
$('#collapseExample2')

                
    </script>       