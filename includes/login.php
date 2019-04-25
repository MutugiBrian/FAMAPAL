<style type="text/css">
  .fas{
    color: <?php echo $tt; ?> !important;
  }
</style>
<?php 
$de = "";
$ne = "";
$wp = "";
if(isset($_POST['ulogin'])){
$umail = $_POST['umail'];
$upass = $_POST['upass'];
$upass = md5($upass);
if($umail == "" || !$umail || $upass == "" || !$upass){
$de = "1";
}else{
    $ev = "SELECT * FROM users WHERE email = '$umail' ";
    $evarray = $conn->query($ev);
    if ($evarray->num_rows > 0) {
    while($det = $evarray->fetch_array()){
    $upw = $det['password'];
    
    if($upass == $upw){
    $uid = $det['id'];
    $utype = $det['type'];
    $_SESSION['jl'] = 1;
    $_SESSION['id'] = $det['id'];
    $_SESSION['email'] = $umail;
    $_SESSION['rating'] = $det['rating'];
    $_SESSION['country'] = $det['country'];
    $_SESSION['industry'] = $det['industry'];
    $_SESSION['city'] = $det['city'];
     $_SESSION['cid'] = $det['cid'];
    $_SESSION['p1'] = $det['p1'];
    $_SESSION['p2'] = $det['p2'];
    $_SESSION['image'] = $det['image'];
    $lat = $det['reg_lat'];
    $long = $det['reg_long'];
    $_SESSION['homelatlong'] = $lat.",".$long;
    $_SESSION['utype'] = $det['type'];
    $_SESSION['ut'] = $det['type'];
    $ind = $_SESSION['industry'];
    
    
       //GET INDUSTRY ID IF EXISTS
   $industries = "SELECT * FROM skills WHERE industry_id = '$ind' ";
    $iarray = $conn->query($industries);
    if ($iarray->num_rows > 0) {while($row = $iarray->fetch_array()){
    $iid = $row['id'];      
    }}else{ 
    //SET NEW INDUSTRY
  
    $_SESSION['ni'] = 1;
    } 
    
    if($utype==1){
     $_SESSION['username'] = $det['bname'];
     	echo "<script>window.location='?page=home';</script>"; 
    }
    elseif($utype==2){
     $_SESSION['username'] = $det['fname'];
      $_SESSION['lname'] = $det['lname'];
    echo "<script>window.location='?page=home';</script>";
    }
    elseif($utype==3){
     $_SESSION['username'] = $det['cname'];
     $_SESSION['cid'] = $det['cid'];
    echo "<script>window.location='?page=home';</script>";
    }else{
    echo "<script>alert('".$utype."');</script>";
    }
    }else{
    $wp=1;
    }
    
    
    
    
    }}else{
    $ne = "1";
    }
}
}
?>       
<section class="form-gradient pgs">

    <!--Form with header-->
    <div class="card wow fadeInUp py-0 px-0">

        <!--Header-->
        
        <!--Header-->

        <div class="card-body mx-0 mt-0 py-0 px-0">
<?php if($de==1){?>
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
  "hideDuration":3000,
  "timeOut": 3000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("The password you entered is wrong enter correct password to continue", "WRONG PASSWORD !") ;
  $("#upass").addClass("invalid"); 

   });
</script>
<?php }?>
<?php if($de==1){?>
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
  "hideDuration":3000,
  "timeOut": 3000,
  "extendedTimeOut": 2000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 Command: toastr["error"]("enter username and password to continue", "FILL IN DETAILS !") ;
  $("#upass").addClass("invalid"); 
  $("#umail").addClass("invalid"); 

   });
</script>
<?php }?>


        <section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="border:2px solid <?php echo $tt; ?>;">

    <!--Section heading--> 
    
      <div class=" nd">
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0 themetext" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2 font-weight-bold themetext" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
      LOG IN
    </span>
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
    <div  class=" no-gutter mx-0 my-0"> 
      <div class="align-middle wow fadeInUp py-2 px-3 mx-0 my-0  d-none errordiv" id="regt" >
      <span class="text-left text-center align-middle mt-1 mr-2 white-text text-white" ><i class="fas fa-exclamation-triangle" style=""></i>
        <span id="regerror">FILL ALL DETAILS</span></span>
    </div>
    
    
    <div class="card-body px-lg-5 " >

        <!-- Form -->
        <form class="" method="POST" action="#" style="color: #757575;">

            <p class="my-2">Fill in your Email and password correctly in the fields to continue.</p>

            <!-- Name -->
            <div class="md-form md-outline mt-3">
               <i class="fas fa-envelope prefix"></i>
                <input type="email" id="umail" name="umail"  class="form-control" >
                <label for="umail">Email</label>
            </div>

            
            <!-- E-mai -->
            <div class="md-form md-outline mb-2">
              <i class="fas fa-lock prefix"></i>
                <input type="password" id="upass" name="upass" class="form-control">
                <label for="upass">Password</label>
            </div>

            <!-- Sign in button -->
           <button type="submit" name="ulogin" id="ulogin" class="d-none">LOGIN</button>

        </form>
        <!-- Form -->
        <center>
        <button class="btn btn-rounded   btn-block z-depth-0 my-4 waves-effect font-weight-bold" style="width:50% !important;background-color: <?php echo $tt; ?>;" id="ln">LOG IN</button>
        </center>
        <div class="modal-footer mx-5 my-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="?page=staffregister" class="blue-text ml-1"> Sign Up</a></p>
            </div>

    </div>
<!-- Material form subscription -->
</div>
</section>
</div>
</div>
</section>

<script>
$("#ln").click(function (){

var umail = $("#umail").val();
var upass = $("#upass").val();


function ed(){
  $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");
  $("#regt").addClass("d-block");
   }
if(umail === "" || umail === null){

 ed();
 $("#regerror").text("please enter your email to continue"); 
 $("#umail").addClass("invalid"); 

}
else if(upass === "" || upass === null){
 ed();
 $("#regerror").text("please enter your password to continue"); 
  $("#upass").addClass("invalid"); 

}
else if(upass.length<6){
 ed();
 $("#regerror").text("password too short"); 
  $("#upass").addClass("invalid"); 

}else{

$("#umail").removeClass("invalid"); 
$("#upass").removeClass("invalid"); 

$("#ulogin").click();

}

});



</script>


<?php if($ne==1){?>
<script>
 $(document).ready(function() {
 

 $(".form-control").removeClass("invalid");
  $("html, body").animate({ scrollTop: 0 }, "slow");
  $("#regt").addClass("d-block");
 $("#regerror").text("wrong user details"); 
 $("#umail").addClass("invalid"); 
  $("#upass").addClass("invalid"); 


  });
</script>
<?php }?>

