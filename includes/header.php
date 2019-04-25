<?php 
error_reporting(0);
ini_set("display_errors", 0);
$color = $_GET['color'];

?>


<?php
if(isset($color) && $color != "" ){
  $_SESSION['color'] = $color;
}else{
  $_SESSION['color'] = $_SESSION['color'];
}
include 'includes/common.php';

require_once ('AfricasTalkingGateway.php');
// Set your app credentials
$username   = $ATusername;
$apikey     = $ATapikey;



//FUNCTION TO SEND MESSAGE

function sendmessage($to,$message){


  $url = 'http://techsultsms.co.ke/sms/api?';
$action = 'send-sms';
$apikey = 'QnJpYW46QnJpYW5QQHNz';
$from = 'Techsult';
$myvars = 'action=' . $action . '&api_key=' . $apikey . '&to=' . $to . '&from=' . $from . '&sms=' .$message ;
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );







$username   = $_SESSION['atun'];
$apikey     = $_SESSION['atk'];
$recipients = $to;
//Create a new Instance 
$gateway  = new AfricasTalkingGateway($username, $apikey);
try
{
    $results = $gateway->sendMessage($recipients, $message);
    foreach ($results as $result){
    /*echo "Number:" .$result->number ;
    echo "Status:" .$result->status ;
    echo "Messageid:" .$result->messageId ;
    echo "Cost:" .$result->cost."\n";*/
  }
}
catch (AfricasTalkingGatewayException $e)
{
return 'error';
}
}



//location


?>

<!DOCTYPE html>
<html lang="en" class="full-height">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $an; ?> - <?php echo $as; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

        <!-- Font Awesome -->
    
      <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->

  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
    <link href="img/sidelogo.png" rel="shortcut icon" type="image/x-icon" /> 
    <!-- Material Design Bootstrap -->
    <link href="v2/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


   

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        /* Necessary for full page carousel*/
        body {
   @font-face {
  font-family: 'font/01182_AgencyFB';
  src: url('font/01182_AgencyFB.eot');
  src: url('font/01182_AgencyFB.woff2') format('woff2'),
       url('font/01182_AgencyFB.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'font/AgencyFB-Reg';
  src: url('font/AgencyFB-Reg.woff') format('woff'),
       url('font/AgencyFB-Reg.svg#AgencyFB-Reg') format('svg');
  font-weight: normal;
  font-style: normal;
}
}

        .full-height,
        .full-height body,
        .full-height header,
        .full-height header .view,
        .full-height body .view {
            height: 100%;
            max-height: 100vh;
        }

        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view,
            .full-height body .view {
                height: 700px;
                max-height: 700px;
            }
        }



        @media (min-width: 1000px) and (max-width: 1025px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view,
            .full-height body .view {
                height: 770px;
                max-height: 770px;
            }
        }

        @media (min-width: 1025px) {
            .view video {
                height: 100vh;
                width: 100%;
                object-fit: cover;
            }
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #1C2331;
        }

        footer.page-footer {
        background-color:    #0d47a1 !important;  
            margin-top: 0;
        }


        /* Carousel*/
        .flex-center {
            color: #fff;
        }

        .carousel-caption {
            height: 100%;
            padding-top: 7rem;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }

        .pagination.pg-dark .active .page-link {
            background-color: #1c2331;
        }
        
        
        
html,
body,
header,
.view {
    height: 100%;
}
/* Navigation*/

.navbar {
background-color:<?php echo $tt; ?> !important; 
z-index:999 !important; 
}
.side-nav{
background-color:<?php echo $tt; ?> !important;  
}

.top-nav-collapse {
    background-color: #2E2E2E;
}


/*Intro*/
.intro-bg1{
  background: url("1.jpg") no-repeat;
}
.intro-bg2{
  background: url("2.jpg") no-repeat;
}
.intro-bg3{
  background: url("3.jpg") no-repeat;
}



#topimg{
 height:70px;
  width:40px;
  margin-left:20px;

}

#logo{
  position:relative;
  height:110px;
  width:110px;
  top:20px;
  
 margin-left: auto;
    margin-right: auto;
    text-align: center;
    display: table-cell;
    vertical-align: middle

border-radius: 150px;
-webkit-border-radius: 150px;
-moz-border-radius: 150px;
background: url(URL) no-repeat;
box-shadow: 0 0 30px rgba(255,255,255, 1);
-webkit-box-shadow: 0 0 40px rgba(255,255,255, 1);
-moz-box-shadow: 0 0 40px rgba( 255,255,255, 1);   



border-style: inset;


      
} 
.btn .fa.fa-sm {
    font-size: 1rem;
    margin-top: -5px;
}      
.container3 { 
  width:100%;
  height: 260px;
  position: relative;
  perspective: 800px;
  margin: 20px auto;     
}

#options {
  margin: 20px auto;
  width: 200px;
  text-align: center;
}

#card {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#card figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#card .front {

}
#card .back {
  transform: rotateY( 180deg );    
  
}

.flip22{
 background-color: rgba(56,33,77,1) !important;
 }

#card.flipped {
  transform: rotateY( 180deg );
}
   
   
  
#cardb {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#cardb figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#cardb .front {

}
#cardb .back {
  transform: rotateY( 180deg );    
  
}

.flip22b{
 background-color: rgba(56,33,77,1) !important;
 }

#cardb.flipped {
  transform: rotateY( 180deg );
}


#cardc {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#cardc figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#cardc .front {

}
#cardc .back {
  transform: rotateY( 180deg );    
  
}

.flip22c{
 background-color: rgba(56,33,77,1) !important;
 }

#cardc.flipped {
  transform: rotateY( 180deg );
}

.form-elegant .font-small {
    font-size: 0.8rem; }

.form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

.form-elegant .modal-header {
    border-bottom: none; 
    color: white !important;
     background-color: #0d47a1 !important;}
.close{
 color: #fff!important;
}

.modal-dialog .form-elegant .btn .fa {
    color: rgba(56,33,77,1) !important; 
    }

.form-elegant .modal-body, .form-elegant .modal-footer {
    font-weight: 400; 
   
    }
      body {
   font-family: "Agency FB regular" !important;
}
.ns{
background-color:<?php echo $tt; ?> !important; 
}
.md-pills{
border:0px !important;
}
.md-pills .active{
background-color:red !important;
position:absolute;
bottom:0;

}

.topimg2{
 height:50px !important;
  width:160px !important;
  position:relative;
  margin-left:17px !important;
}
@media screen and (max-width: 786px) {
    nav {
        min-height: 10% !important;
    }
}  

@media screen and (min-width: 786px) {
    nav {
        min-height: 12% !important;
    }
}  
@media screen and (max-width: 786px) {
    #map-container-3 {
        margin-top: 12% !important;
    }
}
@media screen and (max-width: 786px) {
    #pjdiv {
        margin-top: 12% !important;
    }
} 
@media screen and (max-width: 786px) {
    .pgs {
        margin-top: 8.8% !important;
        
    }
} 


@font-face {
  font-family: '01182_AgencyFB';
  src: url('font/01182_AgencyFB.eot');
  src: url('font/01182_AgencyFB.woff2') format('woff2'),
       url('font/01182_AgencyFB.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'AgencyFB-Reg';
  src: url('font/AgencyFB-Reg.woff') format('woff'),
       url('font/AgencyFB-Reg.svg#AgencyFB-Reg') format('svg');
  font-weight: normal;
  font-style: normal;
}   

        
   </style>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">    
     <link href="css/jquery-ui.multidatespicker.css" rel="stylesheet"> 
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">  
    <style>
    @font-face {
  font-family: '01182_AgencyFB' !important;
  src: url('/font/01182_AgencyFB.eot');
  src: url('/font/01182_AgencyFB.woff2') format('woff2'),
       url('/font/01182_AgencyFB.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}
div.online-indicator {
  display: inline-block;
  width: 18px;
  height: 18px;
  
  background-color: #0fcc45;
  border-radius: 50%;
  
  position: relative;
}
span.blink {
  display: block;
  width: 18px;
  height: 18px;
  
  background-color: #0fcc45;
  opacity: 0.7;
  border-radius: 50%;
  
  animation: blink 1s linear infinite;
}

h2.online-text {
  display: inline;
  
  font-family: 'Rubik', sans-serif;
  font-weight: 400;
  text-shadow: 0px 3px 6px rgba(150, 150, 150, 0.2);
  
  position: relative;
  cursor: pointer;
}

/*Animations*/

@keyframes blink {
  100% { transform: scale(2, 2); 
          opacity: 0;
        }
}
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}

@media screen and (max-width: 786px) {
    .sec {
        margin-top: 14% !important;
    }
} 
.uname{
position:relative;
 top:20px;
 left:0px;
 text-align: center;
 
}
.btn .fa.fa-sm {
    font-size: 1rem;
    margin-top: -5px;
}      
.container3 { 
  width:100%;
  height: 260px;
  position: relative;
  perspective: 800px;
  margin: 20px auto;     
}

#options {
  margin: 20px auto;
  width: 200px;
  text-align: center;
}

#card {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#card figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#card .front {

}
#card .back {
  transform: rotateY( 180deg );    
  
}

.flip22{
 background-color: rgba(56,33,77,1) !important;
 }

#card.flipped {
  transform: rotateY( 180deg );
}
   
   
  
#cardb {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#cardb figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#cardb .front {

}
#cardb .back {
  transform: rotateY( 180deg );    
  
}

.flip22b{
 background-color: rgba(56,33,77,1) !important;
 }

#cardb.flipped {
  transform: rotateY( 180deg );
}


#cardc {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

#cardc figure {
 margin: 0;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

#cardc .front {

}
#cardc .back {
  transform: rotateY( 180deg );    
  
}

.flip22c{
 background-color: rgba(56,33,77,1) !important;
 }

#cardc.flipped {
  transform: rotateY( 180deg );
}

.form-elegant .font-small {
    font-size: 0.8rem; }

.form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

.form-elegant .modal-header {
    border-bottom: none; 
    color: white !important;
     background-color: #4FB3FF !important;}
.close{
 color: #fff!important;
}

.modal-dialog .form-elegant .btn .fa {
    color: rgba(56,33,77,1) !important; 
    }

.form-elegant .modal-body, .form-elegant .modal-footer {
    font-weight: 400; 
   
    }
    
.scrollbar-juicy-peach::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-juicy-peach::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-juicy-peach::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left top, right top, from(#ffecd2), to(#fcb69f));
  background-image: -webkit-linear-gradient(left, #ffecd2 0%, #fcb69f 100%);
  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%); }

.scrollbar-young-passion::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-young-passion::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-young-passion::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left top, right top, from(#ff8177), color-stop(0%, #ff867a), color-stop(21%, #ff8c7f), color-stop(52%, #f99185), color-stop(78%, #cf556c), to(#b12a5b));
  background-image: -webkit-linear-gradient(left, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);
  background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%); }

.scrollbar-lady-lips::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-lady-lips::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-lady-lips::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#ff9a9e), color-stop(99%, #fecfef), to(#fecfef));
  background-image: -webkit-linear-gradient(bottom, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);
  background-image: linear-gradient(to top, #ff9a9e 0%, #fecfef 99%, #fecfef 100%); }

.scrollbar-sunny-morning::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-sunny-morning::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-sunny-morning::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #f6d365 0%, #fda085 100%);
  background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%); }

.scrollbar-rainy-ashville::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-rainy-ashville::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-rainy-ashville::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a6c1ee));
  background-image: -webkit-linear-gradient(bottom, #fbc2eb 0%, #a6c1ee 100%);
  background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%); }

.scrollbar-frozen-dreams::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-frozen-dreams::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-frozen-dreams::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fdcbf1), color-stop(1%, #fdcbf1), to(#e6dee9));
  background-image: -webkit-linear-gradient(bottom, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%);
  background-image: linear-gradient(to top, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%); }

.scrollbar-warm-flame::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-warm-flame::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-warm-flame::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
  background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%); }

.scrollbar-night-fade::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-night-fade::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-night-fade::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#a18cd1), to(#fbc2eb));
  background-image: -webkit-linear-gradient(bottom, #a18cd1 0%, #fbc2eb 100%);
  background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%); }

.scrollbar-spring-warmth::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-spring-warmth::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-spring-warmth::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fad0c4), to(#ffd1ff));
  background-image: -webkit-linear-gradient(bottom, #fad0c4 0%, #ffd1ff 100%);
  background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%); }

.scrollbar-winter-neva::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-winter-neva::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-winter-neva::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #a1c4fd 0%, #c2e9fb 100%);
  background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%); }

.scrollbar-dusty-grass::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-dusty-grass::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-dusty-grass::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
  background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); }

.scrollbar-tempting-azure::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-tempting-azure::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-tempting-azure::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #84fab0 0%, #8fd3f4 100%);
  background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); }

.scrollbar-heavy-rain::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-heavy-rain::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-heavy-rain::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#cfd9df), to(#e2ebf0));
  background-image: -webkit-linear-gradient(bottom, #cfd9df 0%, #e2ebf0 100%);
  background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); }

.scrollbar-amy-crisp::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-amy-crisp::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-amy-crisp::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #a6c0fe 0%, #f68084 100%);
  background-image: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%); }

.scrollbar-mean-fruit::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-mean-fruit::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-mean-fruit::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #fccb90 0%, #d57eeb 100%);
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%); }

.scrollbar-deep-blue::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-deep-blue::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-deep-blue::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #e0c3fc 0%, #8ec5fc 100%);
  background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); }

.scrollbar-ripe-malinka::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-ripe-malinka::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
  background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); }

.scrollbar-cloudy-knoxville::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-cloudy-knoxville::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-cloudy-knoxville::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #fdfbfb 0%, #ebedee 100%);
  background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); }

.scrollbar-morpheus-den::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-morpheus-den::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-morpheus-den::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#30cfd0), to(#330867));
  background-image: -webkit-linear-gradient(bottom, #30cfd0 0%, #330867 100%);
  background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%); }

.scrollbar-rare-wind::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-rare-wind::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-rare-wind::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#a8edea), to(#fed6e3));
  background-image: -webkit-linear-gradient(bottom, #a8edea 0%, #fed6e3 100%);
  background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); }

.scrollbar-near-moon::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-near-moon::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-near-moon::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#5ee7df), to(#b490ca));
  background-image: -webkit-linear-gradient(bottom, #5ee7df 0%, #b490ca 100%);
  background-image: linear-gradient(to top, #5ee7df 0%, #b490ca 100%); }
              
 
 #dashul{
 top:0;
margin: 0px !important;
  display: flex !important;
  flex-direction: row !important;
  justify-content: center !important;
 }
 .ui-datepicker-clear-month {
    position: absolute;
    top: 9px;
    right: 32px;
    height: 100%;
    line-height: 100%;
    display: inline;
    cursor: pointer;
    color: red!important;
}

.menu {
  font-style: 1em;
  width: 100%;
  bottom: 0;
  position: fixed;
  width: 100% !important;
}

.menu ul a li {

  color: white;
  text-decoration: none;
  text-align: center;
  float: left;
  list-style: none;
  width: 20%;
  height: 100%;
  padding: 1%;
   border-top: 2px solid <?php echo $tt; ?> ;
}

.menu ul a li.selected {
  
  border-bottom: 2px solid <?php echo $tt; ?> ;
  border-right: 2px solid <?php echo $tt; ?> ;
  border-left: 2px solid <?php echo $tt; ?> ;
  border-top: none !important ;
  color: <?php echo $tt; ?> !important;
  background-color: <?php echo $tbg; ?> !important;
  font-weight: bold;
  opacity: 0.9;
}

.menu ul a li:hover {
  background: <?php echo $tt; ?> !important;
  color: <?php echo $tbg; ?> !important;
  font-weight: normal;
}

.menu ul a li:hover .fas{
  color: <?php echo $tbg; ?> !important;
}
.tt{
  color: <?php echo $tt; ?> !important;
  font-weight: bold;
}
.tbr{
  border-bottom: 2px solid <?php echo $tt; ?> !important;
}
.tbg{
  background-color: <?php echo $tbg; ?> !important;
}

.nb{
  background-color: <?php echo $tt; ?> !important;
}
.nt{
  color: <?php echo $tbg; ?> !important;
  font-weight: bold;
}
.nd{
background-color: none !important;
color: <?php echo $tt; ?> !important; 
margin:0px 2px 0px 2px !important;
border-bottom:2px solid <?php echo $tt; ?>;
}
.nd h4 .fa{
color: <?php echo $tt; ?> !important;  
}
.nd h4 span{
font-weight:bold !important;  
}
.errordiv{
 background-color:#ff6961;
 margin:0px 2px 0px 2px !important;
}
.errordiv span{
  color:white !important;

}
.errordiv span i{
  color:white !important;

}
.uc{
  background-color: red !important;
}




  
   </style>     
</head>
<body>
<!--Double navigation-->



<script>
function getLocationConstant()
{
  if(navigator.geolocation)
  {
   navigator.geolocation.getCurrentPosition(onGeoSuccess,onGeoError);
  } else {
   alert("No GPS support");
  }
}


function onGeoSuccess(event)
{
    document.getElementById("location").value =  event.coords.latitude+", "+event.coords.longitude;
    alert("Success: "+event.coords.latitude+", "+event.coords.longitude);
}


function onGeoError(event)
{
}

getLocationConstant();


</script>


<?php 

if(isset($_POST['bsb'])){

  $key = $_POST['key'];
?>
<script type="text/javascript">
   window.location.href = '?page=search&key=<?php echo $key;?>';
</script>


<?php
}

?>





<!-- SideNav slide-out button -->


<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav ns" style="background-color:<?php echo $t; ?> !important;">
  <ul class="custom-scrollbar" style="background-color:<?php echo $t; ?> !important;">
      <!-- Logo -->
      <li>
      <center>
         <img src="<?php if(isset($_SESSION["id"])){ echo $_SESSION["image"]; }else{ echo "./img/sidelogo.png";}?> " class="logo-wrapper rounded-circle z-depth-1 my-2 p-1" style="height:130px !important;width:130px !important;<?php if($_SESSION["id"]>0 && $_SESSION["image"] != "uploads/profileimages/1541333686roninbg.png"){ echo "border:2px solid white !important;"; }?> " >
    </center>
          </li>
      <!--/. Logo -->
      <!--Social-->
      <li>
      <?php if(@$_SESSION["id"]>0){?>
        <center class="font-weight-bold text-success">
      <?php echo $_SESSION["username"]; ?>
        </center>
        <center>
        <i>
      <?php if($_SESSION["ut"]==1){
      echo "- farmer";
      }elseif($_SESSION["ut"]==2){
       echo "- buyer";
      }else{
      $cid = $_SESSION['cid'];
         echo "- contractor <br />";
         echo "
         <center>
         contractor id: <span class='font-weight-bold text-success'>".$cid."</span>
         </center>
         ";
      } ?>
        </i>
        </center>
        <ul class="social">
        </ul>
      
      <?php }else{ ?>
      
       <ul class="social">
              <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
              <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
              <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
              <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
          </ul>
      
      
       <?php } ?>
         
      </li>
      <!--/Social-->
      <!--Search Form-->
      <?php if(@$_SESSION["id"]>0){ ?>  
      <li>
          <form class="search-form" role="search" action="" method="post">
              <div class="form-group md-form mt-0 pt-0 pb-0 waves-light">
                  <input type="text" name="key" class="form-control" placeholder="Search" style="background-color:white !important;color: <?php echo $tt; ?> !important;" value="Search Here...">
              </div>
              <button type="submit" class="d-none" name="bsb"></button>
          </form>
      </li>
    <?php } ?>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
          <ul class="collapsible collapsible-accordion ">
<li>
 <a href="?" class="waves-effect <?php if(@$_REQUEST['page']=="home"||@$_REQUEST['page']=="") echo "active";?> waves-effect py-0 my-0" style="color: white !important;">
 <i class="fa fa-th" aria-hidden="true"></i> HOME 
 </a> 
 </li>

      
 
<?php if(@$_SESSION["id"]>0){ 

  ?>  

<li>
<a  href="?page=notifications&user=<?php echo $_SESSION["id"];?>" class="waves-effect <?php if(@$_REQUEST['page']=="notifications") echo "active";?> py-0 my-0" style="color: white !important;"> 
<i class="fa fa-bell" aria-hidden="true"></i> NOTIFICATIONS <span class="font-weight-bold d-none" style="background-color:red;padding:3px;border-radius:60%;" id="notsno"></span>

<script>
$(document).ready(function() {

var uid = "<?php echo $_SESSION['id'] ; ?>";
$.post("ajax/getnotifications.php?id="+uid, function(data) {
if(data >0){
$("#notsno").removeClass("d-none");
$("#notsno").val(data);
$("#notsno").html(data);
}else{
$("#notsno").removeClass("d-none");
$("#notsno").addClass("d-none");

}
});



});
window.setInterval(function(){
var uid = "<?php echo $_SESSION['id'] ; ?>";
$.post("ajax/getnotifications.php?id="+uid, function(data) {
if(data >0){
$("#notsno").removeClass("d-none");
$("#notsno").val(data);
$("#notsno").html(data);
}else{
$("#notsno").removeClass("d-none");
$("#notsno").addClass("d-none");

}
});   
}, 15000);
</script>


</a> 
</li>
                    
  <?php if(@$_SESSION["ut"]==2){?>                  
                    
   <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-briefcase"></i>MY JOBS<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="?page=activejobs" class="waves-effect">Active Jobs</a>
                          </li>
                          <li><a href="?page=openjobs" class="waves-effect">Open Jobs</a>
                          </li>
                          <li><a href="?page=completejobs" class="waves-effect">Completed Jobs</a>
                          </li>
                      </ul>
                  </div>
              </li>                   
                    
                    
                    
                    <?php } ?>            
                   <?php if(@$_SESSION["ut"]==1){?>                
                   <li>
                   <a href="?page=postjob"  class="waves-effect <?php if(@$_REQUEST['page']=="postjob") echo "active";?> waves-effect py-0 my-0  " >
                   <i class="fa fa-plus" aria-hidden="true"></i> POST CROP
                   </a>
                   </li>
                   <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-spa"></i> MY CROPS<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="?page=activejobs" class="waves-effect">Ready Crops</a>
                          </li>
                          <li><a href="?page=openjobs" class="waves-effect">Maturing Crops</a>
                          </li>
                          <li><a href="?page=completejobs" class="waves-effect">Sold Crops</a>
                          </li>
                      </ul>
                  </div>
              </li> 
                   <?php } ?> 
     
                     <?php }else{?>
<li>
<a href="?page=login" class="waves-effect 
<?php if(@$_REQUEST['page']=="login") echo "active";?>
 waves-effect py-0 my-0  text-uppercase">
<i class="fa fa-key" aria-hidden="true"></i> LOGIN 
</a>
</li>


 <li id="regi"><a  class="collapsible-header waves-effect arrow-r <?php if(@$_REQUEST['page']=="staffregister" || @$_REQUEST['page']=="contractorregister" ||  @$_REQUEST['page']=="clientregister"  ) {echo 'active';}?>" ><i class="fa fa-chevron-right"></i>  REGISTER<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body" >
                      <ul><li><a href="?page=clientregister" class="waves-effect" <?php if(@$_REQUEST['page']=="clientregister"){echo 'active';} ?>>As employer</a>
                          </li>
                          <li><a href="?page=staffregister" class="waves-effect <?php if(@$_REQUEST['page']=="staffregister"){echo 'active';} ?>">As employee</a>
                          </li>
                          <!-- <li><a href="?page=contractorregister" class="waves-effect  <?php if(@$_REQUEST['page']=="contractorregister"){echo 'active';} ?>">As Contractor</a>
                          </li> -->
                      </ul>
                  </div>
              </li> 
              
  <script>
$("#regi").click('show');
</script>



<?php } ?>
<li> 
<a href="?page=contactus"  class="waves-effect 
<?php if(@$_REQUEST['page']=="contactus") echo "active";?>
 waves-effect py-0 my-0  ">
<i class="fa fa-envelope-o"></i> CONTACT US   
</a>
</li>       

<li>
<a href="?page=faqs"  class="collapsible-header waves-effect arrow-r">
<i class="fa fa-comments-o"></i> FAQs</a>
</li>
<?php if(@$_SESSION["id"]>0){ ?> 
<li>
<a href="?page=profile" class="waves-effect waves-effect py-0 my-0  ">
<i class="fa fa-user" aria-hiden="true"></i>&nbsp;&nbsp;PROFILE</a>
</li>  
<li>
<a href="?page=logout" class="waves-effect waves-effect py-0 my-0  ">
<i class="fa fa-power-off" aria-hiden="true"></i>&nbsp;&nbsp;LOGOUT</a>
</li>   
              <?php } ?>



  <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-palette"></i>CHANGE THEME<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li style="background-color: #178943 !important; "><a href="?color=green" class="waves-effect font-weight-bold">DEFAULT</a>
                          </li>
                          <li style="background-color: #367BC3 !important; "><a href="?color=blue" class="waves-effect font-weight-bold">BLUE</a>
                          </li >
                          <li style="background-color: #B233CC !important; "><a href="?color=purple" class="waves-effect font-weight-bold">PURPLE</a>
                          </li>
                      </ul>
                  </div>
              </li>                   
                     
    
             
          </ul>
      </li>
      <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg" style="background-color:<?php echo $tt2; ?> !important;"></div>
  
  <div class="col-12 text-center" style="position:fixed;bottom:0px;width:100%;bottom:0;margin-bottom:0px !important;">
    &copy; <?php echo date('Y'); ?> <?php echo $an; ?> </div>
</div>
<!--/. Sidebar navigation -->             

               <nav class="navbar fixed-top navbar-toggleable-md  double-nav z-depth-1 navbar-dark tbg z-depth-0 nb" style="height: 56px;margin-bottom:0px !important;padding-top: 0px !important;background-color: <?php echo $t; ?> !important;background:cover !important;position:fixed !important;">
             
            <!-- <div class="d-block d-sm-none d-md-none d-xl-none my-auto py-0 mx-auto" style="margin-left: 39% !important;" > -->
             <!-- <img src="./uploads/platform/logo.png" class="topimg2"> -->
            <!-- <a href="?" ><div style="font-weight: bold;font-size: 35px !important;" class="nt"><?php echo $an; ?></div></a>
            </div> -->
    
    
            <!-- <div class="float-left d-block d-sm-none d-md-none d-xl-none" style="position:fixed;left:0;position:absolute !important;">
                <a href="#" data-activates="slide-out" class="button-collapse text-white"><i class="fa fa-bars nt"></i></a> 
                                                
            </div> -->



          <?php if($_SESSION['color'] == 'green' || $_SESSION['color'] == ''){?>
            <div class="d-block d-sm-none d-md-none d-xl-none my-0 py-0 mx-auto"  >
             <img src="./img/sm.png" class="topimg2" >
            </div>
    


          <?php }else{?>
            <center >
              <DIV class="text-center" style="width: 100% !important;">
                <span style="margin-left: 190px !important;font-weight: bold !important;font-size: 50px !important;color: white !important;">FAMAPAL </span>
              </DIV>
              
            </center>

           <?php } ?>
             
    
            <div class="float-left d-block d-sm-none d-md-none d-xl-none" style="position:absolute;left:0;">
                <a href="#" data-activates="slide-out" class="button-collapse text-white"><i class="fa fa-bars"></i></a> 
                                                
            </div>
            <!-- Breadcrumb-->
            <div class="d-none d-sm-block d-md-block d-xl-block mr-2 my-0 py-0">
            <img src="./img/xl.png" style="height:70px !important;
  width:230px !important;">
            </div>
             


             <div class="float-right d-block d-sm-none d-md-none d-xl-none" style=""><!-- 
                <a href="#" data-activates="slide-out" class="button-collapse text-white"><i class="fa fa-user nt"></i></a>  -->

                <?php if(@$_SESSION["id"]>0){ ?>
                <a href="?page=profile" class=" text-white"><i class="fas fa-user-circle mt-0" style="color:white !important;font-size: 28px;"></i></a>
              <?php }else{?>
                 <a href="?page=login" class=" text-white"><i class="fas fa-lock mt-0" style="color:white !important;font-size: 22px;"></i></a>
              <?php } ?>
                                                
            </div>
            <!-- Breadcrumb-->
            <!-- <div class="d-none d-sm-block d-md-block d-xl-block mr-2 my-0 py-0">
            <img src="./uploads/platform/logo.png" style="height:70px !important;
  width:170px !important;">
            </div> -->
             
            
    
    
    
    
    
    
    
    
    
    
    
            <ul class="nav navbar-nav nav-flex-icons ml-auto z-depth-0 d-lg-flex d-none my-0 py-0 ">
            
            
            
            
            
            
                  <li>&nbsp;&nbsp;</li> 
                  
                  
                        
                <li   class="nav-item <?php if(@$_REQUEST['page']=="home"||@$_REQUEST['page']=="") echo "active";?>"  style="color: white !important;border:none !important;float:left !important;">  <a href="?" class="nav-link" style="color: white !important;"><i class="fa fa-th" aria-hidden="true"></i> HOME</a> </li>   



                                         
                
                  <?php if(@$_SESSION["idd"]>0){ ?>            
                                 
                  <li   class="nav-item <?php if(@$_REQUEST['page']=="notifications") echo "active";?>"  style="color: white !important;border:none !important;float:left !important;">  <a href="?page=notifications&user=<?php echo $_SESSION["idd"];?>" class="nav-link" style="color: white !important;"><i class="fa fa-bell" aria-hidden="true"></i> NOTIFICATIONS </a> </li>                             
                
                  
                   <li class="nav-item <?php if(@$_REQUEST['page']=="postjob") echo "active ";?>"  style="color: white !important;border:none !important;"><a href="?page=postjob"style="color: white !important;border:none !important;text-transform: uppercase;" class="nav-link" ><i class="fa fa-plus" aria-hidden="true"></i> POST JOB</a></li>
                 
                   
                    
                    
                    
                    
                    
                    <?php }?>
            
                  <li   class="nav-item <?php if(@$_REQUEST['page']=="contactus") echo "active";?>"  style="color: white !important;border:none !important;float:left !important;"> <a href="?page=faqs"   style="color: white !important;" class="nav-link"class="nav-link"><i class="fa fa-comments-o"></i>CONTACT US   </a></li>        
               
                   <li   class="nav-item <?php if(@$_REQUEST['page']=="faqs") echo "active";?>"  style="color: white !important;border:none !important;float:left !important;">
                    <a href="?page=faqs"   style="color: white !important;" class="nav-link"class="nav-link"><i class="fa fa-comments-o"></i>FAQs</a>
                  </li>       
               
                    
                
                  <li   class="nav-item "  style="color: white !important;border:none !important;float:left !important;"></li>                                    
             
                        <?php
                            if(@$_SESSION["id"]>0){
                                ?>        
<div class="nav-item dropdown">                                             
<div id="chipss"class="chip chip-md cyan darken-2 white-text my-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">

    





<img src="<?php echo $_SESSION['image']; ?>" class="z-depth-2" style="border:2px solid white !important;"alt="DP"><?php echo $_SESSION['username']; ?>
</div> 
<div class="dropdown-menu dropdown-secondary" aria-labelledby="chipss">                 
<a href="?page=myAccount" class="dropdown-item"  class="nav-link">
<i class="fa fa-user text-secondary"></i>&nbsp;&nbsp;MY ACCOUNT</a>  
<a class="dropdown-item" href="?page=logout"   style="text-transform: uppercase;">
<i class="fa fa-power-off text-secondary" aria-hiden="true"></i>&nbsp;&nbsp;LOGOUT</a>
</div>
</div>            
              
  
                                
                                <?php
                                }else{
                            ?>
                                                   
                                <li class="nav-item btn-group dropdown <?php if(@$_REQUEST['page']=="staffregister"||@$_REQUEST['page']=="clientregister"||@$_REQUEST['page']=="contractorregister") echo "active";?>"  style="color: white !important;border:none !important;">
                                
                                
                                
                                

    
                                <a class="nav-link dropdown-toggle "id="dropdownMenu2"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white !important;border:none !important;text-transform: uppercase;"><i class="fa fa-user-plus" aria-hiden="true"></i> REGISTER</a>
                                
                              
    
                                <div class="dropdown-menu dropdown-secondary">                              
         <a class="dropdown-item" href="?page=clientregister">As Client</a>
         <a class="dropdown-item" href="?page=staffregister">As Staff</a>
         <!-- <a class="dropdown-item" href="?page=contractorregister">As Contractor</a> -->
     </div>
                                
                                
                                </li>
                                                   
                            <?php
                                }
                            ?>
                            <?php if(!isset($_SESSION['username'])) {?>
                                
                                <li class="nav-item  <?php if(@$_REQUEST['page']=="login") echo "active";?>"  style="color: white !important;border:none !important;"> 
                                 <a class="nav-link" href="?page=login" style="color: white !important;border:none !important;text-transform: uppercase;" class="nav-link"><i class="fa fa-key" aria-hiden="true"></i> LOGIN</a></li>
                                <?php } else { ?>
                                <li class="nav-item"  style="color: white !important;">    <span  style="color:#125e9a;"></span><span style="color:#125e9a;"></span></li>
                                <?php } ?>
                     <?php
                    if(intval(@$_SESSION["id"])>0){}
                    else {
                        ?>
                        
              <?php }?> 
                        
               
            </ul>
            </nav><br /> 
            
            
                                    

<script>

$(".nav-item").click(function() { 


$(this).toggleClass("purple-text"); 

});

</script>


    
    
    
 <?php
                        
                        function getPerd($eventTime2){
                         
                        $eventTime = ''.$rows['created'].' 17:25:43';
$age = time() - strtotime($eventTime2);
if(($age/31557600)>1) {
  $years = $age/31557600;
   $yearsi =  round($years);
    if($yearsi>1) {
     echo "$yearsi Years ago";
    }else{
  echo"One year ago"; 
  }
  
  }
elseif(($age/2678400)>1){
    $months =  $age/2678400;
    $monthsi =  round($months);
      if($monthsi>1) {
     echo "$monthsi Months ago";
    }else{
  echo"1 month ago"; 
  }
  }
elseif(($age/604800)>1){
    $weeks = $age/604800 ;
    $weeksi =  round($weeks);
    if($weeksi>1) {
     echo $weeksi.' Weeks ago';
    }else{
  echo "1 Week ago"; 
  }
  }
elseif(($age/86400)>1){
    $days = $age/86400 ;
    $daysi =  round($days);
       if($daysi>1) {
     echo $daysi.' Days ago';
    }else{
  echo"1 day ago"; 
  }
  }
elseif(($age/3600)>1){
    $hrs = $age/3600 ;
    $hrsi =  round($hrs);
       if($hrsi>1) {
     echo $hrsi.' Hours ago';
    }else{
  echo" 1 hour ago"; 
  }
  }
elseif(($age/60)>1){
    $mins = $age/60;
    $minsi =  round($mins);
       if($minsi>1) {
     echo $minsi.' Minutes ago';
    }else{
  echo'<span style="color:green;font-weight:bold;">1 Minute ago</span>'; 
  }
  }
else{
    echo "<span style='color:green;font-weight:bold;'>Just Now</span>";
  }
  
              }        
              
              
 include 'includes/functions.php';   
 
 
   if(@$_REQUEST['page'] != "postjob"){   
if(isset($_SESSION['id'])){       
$uid = $_SESSION['id']; 
$tt = time();
$pj = "UPDATE `users` SET `lspj` = '0' WHERE `users`.`id` = $uid";
$npj = $conn->query($pj);
}
}  
                         ?>   




                         <?php 
    if(isset($_SESSION["realip"])){}else{
      $ip = file_get_contents('https://api.ipify.org');
    $_COOKIE["realip"] = $ip;
    $_SESSION["realip"] = $ip;
    }


    if(isset($_SESSION['city']) && isset($_SESSION['country'])){

    }else{

      //END OF GET IP
    $ipaddress = $_SESSION["realip"] ;
    $auth2 = "2b0f8a3e-0bdf-4a9b-a29d-aae752a2dcf5";
    $auth3 = "83a4ac34-126a-47bb-b06c-9c75f61eb740";
    $auth1 = "d0eb8410-c403-483e-a7fb-750f787a1136";
    $auth5 = "676be931-6c5a-4c60-ab5a-4401ac5a038a";
        
    $resultq = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth5.''));
    $result =  (array)$resultq;
    if(!isset($result['error'])){
    $_SESSION['ip'] = $ipaddress;
    $_SESSION['country'] = $result['country'];
    $_SESSION['city'] = $result['city'];

    }else{
    
    $resultq = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth2.''));
    $result =  (array)$resultq;
    if(!isset($result['error'])){
    $_SESSION['ip'] = $ipaddress;
    $_SESSION['country'] = $result['country'];
    $_SESSION['city'] = $result['city'];
  
    
    }else{
    
    
    $resultq = json_decode(file_get_contents('https://ipfind.co/?ip='.$ipaddress.'&auth='.$auth1.''));
    $result =  (array)$resultq;
    if(!isset($result['error'])){
    $_SESSION['ip'] = $ipaddress;
    $_SESSION['country'] = $result['country'];
    $_SESSION['city'] = $result['city'];
  
    
    }
    
    
    }
    }
  }
    
    ?>   
<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    
  }
}



function showPosition(position) {
  /*alert(position.coords.latitude + 
  " - long :  " + position.coords.longitude);*/

  document.cookie="reallat="+position.coords.latitude; 
   document.cookie="reallong="+position.coords.longitude; 

   /*alert('<?php echo $_COOKIE["realip"]; ?>');*/
}

getLocation();


window.setInterval(function(){
  getLocation()
}, 5000);



</script>
<script type="text/javascript">
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
</script>
   

