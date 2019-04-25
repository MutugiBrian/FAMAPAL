<?php 
error_reporting(0);
ini_set('display_errors',0);
session_start();

include 'includes/header.php';





 

 
?>

<div style="margin-top: 0px !important;">

<?php
	if(isset($_GET['page'])){	
  
 	if($_GET['page']=='logout'){
  ?>
  
  <script>
   function sn() {
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
 Command: toastr["error"]("", "LOGGED OUT") ;
};
return sn();
 </script>
  
  
  <?php
    if(isset($_SESSION['id'])){
    //UPDATE TO DB AS OFFINE
    $ts = time();
    $uid = $_SESSION['id']; 
    $indreg = "UPDATE `users` SET `lsts` = '' WHERE `users`.`id` = $uid";   
    $indregarray = $conn->query($indreg); 
    if ($indregarray === TRUE) {
    //code to alert the update
    }else{
    //code to alert the error
    } 
    }
    session_destroy();
    echo "<script>window.location='?';</script>"; 
   
   
   }else {
  
  						
							if($_GET['page']=='home')include('includes/home.php');							
							else {
								if (!file_exists('includes/'.$_GET['page'].'.php')){
									echo "<script>alert('PAGE UNDER CONSTRUCTION');</script>";								
								}	
								
								include('includes/'.$_GET['page'].'.php');
							} }
						}else{
include 'includes/home.php';
}
?>
</div>


<?php 
include 'includes/footer.php';
?>


</body>

</html>