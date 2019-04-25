
<!--Footer-->




<footer class="page-footer font-small stylish-color-dark pt-0 mt-4 ns" style="">
<div class="menu" style="width: 100% !important;z-index: 999;font-size:10px !important;">


  <?php if(@$_SESSION["id"]>0){ ?> 


        <ul style="width: 100% !important;z-index: 999;">
      <?php 
      if(isset($_GET['page'])){
      $page = $_GET['page'];
      }else{
      $page = '';
      }
      ?>
      <a href="?">
        <li class="tt  tbg waves-effect <?php if($page == 'home' || $page == ''){echo "selected"; }?> "> <i class="fas fa-align-justify"></i>&nbsp;&nbsp;&nbsp;HOME </li>
      </a>

      <a href="?page=notifications" >
        <li class="tt  tbg  waves-effect <?php if($page == 'notifications'){echo "selected"; }?>"><i class="far fa-bell"></i>&nbsp;&nbsp;&nbsp;ALERTS</li>
      </a>
      
      <?php 

      //IF USERTYPE NOT EMPLOYER DONT SHOW POST JOB
      if($_SESSION['ut'] == 1){?>

     <a href="?page=postjob">
        <li class="tt  tbg waves-effect <?php if($page == 'postjob'){echo "selected"; }?>"><i class="fas fa-lock"></i>&nbsp;&nbsp;&nbsp;POSTCROP </li>
      </a>


     <?php
      }else{
        //SHOW JOB FEED
      ?>
      <a href="?page=contactus">
        <li class="tt  tbg waves-effect <?php if($page == 'contactus'){echo "selected"; }?>"><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;CONTACT </li>
      </a>


      <?php
      }
      ?>
      

      <a href="?page=logout">
        <li class="tt  tbg waves-effect <?php if($page == 'logout'){echo "selected"; }?>"> <i class="fas fa-power-off"></i>&nbsp;&nbsp;&nbsp;LOG OUT </li>
      </a>

      <a href="?page=faqs">
        <li class="tt  tbg waves-effect <?php if($page == 'faqs'){echo "selected"; }?>"> <i class="fas fa-comments"></i>&nbsp;&nbsp;&nbsp;FAQs</li>
      </a>
    </ul>





  <?php }else{ ?>
    <ul style="width: 100% !important;z-index: 999;font-size:10px !important;">
      <?php 
      if(isset($_GET['page'])){
      $page = $_GET['page'];
      }else{
      $page = '';
      }
      ?>
      <a href="?">
        <li class="tt  tbg waves-effect <?php if($page == 'home' || $page == ''){echo "selected"; }?> "> <i class="fas fa-align-justify"></i>&nbsp;&nbsp;&nbsp;HOME </li>
      </a>

      <a href="#" data-toggle="modal" data-target="#regmodal">
        <li class="tt  tbg  waves-effect <?php if($page == 'clientregister' || $page == 'staffregister'){echo "selected"; }?>"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;&nbsp;JOIN</li>
      </a>

      <a href="?page=login">
        <li class="tt  tbg waves-effect <?php if($page == 'login' || $page == 'logins'){echo "selected"; }?>"><i class="fas fa-lock"></i>&nbsp;&nbsp;&nbsp;LOGIN </li>
      </a>

      <a href="#">
        <li class="tt  tbg waves-effect"> <i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;ABOUT </li>
      </a>

      <a href="?page=faqs">
        <li class="tt  tbg waves-effect <?php if($page == 'faqs'){echo "selected"; }?>"> <i class="fas fa-comments"></i>&nbsp;&nbsp;&nbsp;FAQs</li>
      </a>
    </ul>
  <?php } ?>
  </div>

</footer>


<!-- Modal -->
<div class="modal fade" id="regmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
     
     <div class="wow fadeInUp row rounded">

   <div class="col-6 text-center align-items-center text-center" style="border-right:  1px solid <?php echo $tt; ?>">

    <i class="fas fa-vial  tt " style="font-size:120px;position: relative;top: 10%;"></i><br /><br />

     <a href="?page=clientregister"class="btn btn-outline-primary waves-effect px-2 text-center" style="/*background-color:<?php echo $tt; ?> !important;*/border-color:<?php echo $tt; ?> !important;color:<?php echo $tt; ?> !important;">AS FARMER</a>
   
    </div>  

    <div class="col-6 p-2 align-items-center text-center"  style="border-left: 1px solid <?php echo $tt; ?>">

       <i class="fas fa-shopping-cart tt " style="font-size:120px;position: relative;top: 10%;"></i><br /><br />

     <a href="?page=staffregister"class="btn btn-outline-primary waves-effect px-2 text-center" style="/*background-color:<?php echo $tt; ?> !important;*/border-color:<?php echo $tt; ?> !important;color:<?php echo $tt; ?> !important;">AS BUYER</a>
    


    </div>


    </div>


    </div>
  </div>
</div>
</footer> 

   <script>
function goBack() {
    window.history.back();
}
</script>
        
    <!-- SCRIPTS -->

    <!-- JQuery -->          <script type="text/javascript"   src="js/mainJs.js"></script>
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="v2/js/mdb.min.js"></script>
     <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->     
    
    
    
    
                        
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>    
    
    
    
    
    
    
    
                                    
     <script type="text/javascript">
    // SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar); 

    </script> 
      
                        
 <script>

$(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");  
});
                
</script> 
    <script>
      new WOW().init();
      
      
      $("#from").pickadate({
      var tto = $("#to").val();
     });
     $("#to").pickadate({
      var from = $("#from").val();
      max: [from]
     })
     </script>
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
 $(document).ready(function() {
    $('.mdb-select').material_select();
    $('.chips-placeholder').materialChip({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
});
  });

    </script>  
    
    
    <script>
    
    $('.datepicker').pickadate();
    
    $(".avselect").pickadate({
      closeOnSelect: false,
      multidate: true,
closeOnClear: false

    });
    </script>
    
    
    
    <script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('admap'), {                 
          center: {lat: <?php echo $_SESSION["latitude"];?>, lng: <?php echo $_SESSION["longitude"];?>},
          zoom: 8
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); 
            $("#pac-input").addClass("text-success");
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>

    <script type="text/javascript">
  $(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $gmapkey; ?>&libraries=places&callback=initMap"
        async defer></script>
     
  
    <script type="text/javascript" src="js/custom.js"></script> 
    
    <script type="text/javascript" src="js/jquery-ui.multidatespicker.js"></script>     

                      