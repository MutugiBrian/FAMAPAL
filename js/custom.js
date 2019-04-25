  $(document).ready(function() {    
  $('#countryselect').change(function() {
    country_id = this.value;

 $('#selectcity').load('ajax/getcity.php?countryid=' + country_id);
 wto = setTimeout(function() {
  
   $('#selectcity').material_select('destroy');   
$('#selectcity').load('ajax/getcity.php?countryid=' + country_id);
$('#selectcity').material_select();
$('#selectcity').load('ajax/getcity.php?countryid=' + country_id);
    
}, 500);
   

  });
  
  
  
    $('#industryselect').change(function() { 

    industry_id = this.value;    
     


 $("#skillselect").empty();
  $.post("ajax/getskills.php?industryid="+industry_id, function(data) {
  $('#skillselect').material_select('destroy'); 
  $("#skillselect").html(data);  
   $('#skillselect').material_select();
  });     
   

  });

 });