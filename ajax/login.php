         	<div class="mt-3 pt-3">
          </div>
           <form method="post" action="?page=login" name="formLogin" onsubmit="return checkFormLogin()" class="my-5">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center">
                <h3 class="modal-title w-100 font-weight-bold my-3" id="myModalLabel"><strong>RONIN LOGIN</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
            
            
                <!--Body-->
                <div class="md-form mb-5">
                    <input type="text" id="txtEmail" name="txtEmail" class="form-control validate" 
                    <label data-error="wrong" data-success="right" for="Form-email1">  <i class="fa fa-envelope"></i> Email </label>
                </div>

                <div class="md-form pb-3">
                    <input type="password" id="txtPassword" name="txtPassword" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Form-pass1"> <i class="fa fa-lock"></i> Password</label>
                    <p class="font-small blue-text d-flex justify-content-end"><a href="?page=forgetPass" class="blue-text ml-1">Forgot Password ??</a></p>
                </div>

                <div class="text-center mb-3">
               </div> 
               
               
               <div class="md-form pb-3">
             
                            	
                                
                                
               </div>
               
    <div class="text-center mb-1">
                <button type="submit" value="login"  id="sbLogin" name="sbLogin" class="btn blue-gradient btn-block btn-rounded z-depth-1a">LOGIN</button>
            </div>
                                    
                                    
                               
                
    
            </div>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="?page=staffregister" class="blue-text ml-1"> Sign Up</a></p>
            </div>
        </div>
        <!--/.Content-->
    </div>
    </form>