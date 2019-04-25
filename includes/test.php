 <section class="form-gradient pgs">

    <!--Form with header-->
    <div class="card wow fadeInUp py-0 px-0">

        <!--Header-->
        
        <!--Header-->

        <div class="card-body mx-0 mt-0 py-0 px-0">
 <section class="section align-middle wow fadeInUp py-0 px-0 mx-0 my-0" style="margin-top: 0px !important;padding-top: 0px !important;border:2px solid <?php echo $tt; ?>;">

    <!--Section heading--> 
    
    <div class="py-0 nd"style="margin-bottom: 0px !important;" >
    
    <h4 class="mx-0 my-0 p-0 h4" > 
    <a href="#" class="text-white text-left" onclick="goBack()"><i class="fa fa-arrow-circle-o-left ml-3 mr-0 mt-2 mb-0" style="font-size:30px;"aria-hidden="true"></i></a>
    <span class="text-right text-center align-middle mt-3 mr-2 font-weight-bold" style="float: right !important;font-size: 18px;margin-top: 11px !important;">
    SOIL TESTING
    </span>
    </h4>

    </div>

    <div class="card-body px-lg-5 mb-1" style="min-height: 85vh;">
 <div class="card mb-1">

            <!-- Card header -->
            <div class="card-header text-center">
              NUTRIENTS(NPK) COMPOSITION
            </div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="pieChart"></canvas>

            </div>

          </div>



           <div class="card mb-1 z-depth-0" style="width: 100% !important;">

            <!-- Card header -->
            <div class="card-header z-depth-0 text-center font-weight-bold" style="background-color: white !important;">
              SUGGESTED CROPS
            </div>

            <!--Card content-->
            <div class="card-body z-depth-0">
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >

<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp"  > 
<div class="card z-depth-1 rounded-bottom">
<img class='card-img z-depth-0' src='uploads/platform/maize.jpg' style='height:170px;margin:0px;padding:0px;borde-radius:0px !important;'/>              
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;" class="mx-2 text-center" >
MAIZE
</div>
                        
</div>

<hr class="mx-2 my-0">
   <!-- Card footer -->

<hr class="mx-2 my-0">   
<div class="lighten-3 text-center pt-0 rounded-bottom" >
best for high nitrogen 
</div>
</div>
</div>


</div>
</div>
</div>
</div>




 <div class="card mb-1 z-depth-0" style="width: 100% !important;">

            <!-- Card header -->
            <div class="card-header z-depth-0 text-center font-weight-bold" style="background-color: white !important;">
              SUGGESTED FERTILIZERS
            </div>

            <!--Card content-->
            <div class="card-body z-depth-0">
<div class="" style="padding:0px !important;"> 
<div class="row no-gutter"  style="margin:0px !important;padding:0px !important; " >

<div class="col-lg-3 col-md-4  col-6 py-2 px-1 px-lg-2 px-md-2 z-depth-0 wow fadeInUp"  > 
<div class="card z-depth-1 rounded-bottom">
<img class='card-img z-depth-0' src='uploads/platform/spsp.jpg' style='height:180px;margin:0px;padding:0px;borde-radius:0px !important;'/>              
                
<div class="card-body primary-text text-primary mx-2" style="margin:0px !important;padding:3px !important;font-size:11px;">
<div style="font-weight:bold;" class="mx-2 text-center" >
SUPER PHOSPHATE
</div>
                        
</div>
<hr class="mx-2 my-0">
<hr class="mx-2 my-0">   
<div class="lighten-3 text-center pt-0 rounded-bottom" >
to increase phosphorus
</div>
</div>
</div>


</div>
</div>
</div>
</div>





   </div>





</section>
</div>
</div>
</section>

  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
   <script type="text/javascript">
   	   var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["NITROGEN", "PHOSPHORUS", "POTASSIUM"],
        datasets: [{
          data: [4, 1, 1],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });
   </script>
        <script>
function goBack() {
    window.history.back();
}
</script>
