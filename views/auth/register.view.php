<?php
  require_once dirname(__DIR__) . '/layouts/header.php';
?>



    <div id="analytics-box">
        <div id="analytics-header">
            <h6 class="pull-left"><strong>Register</strong></h6>
            <small class="pull-right">Get access, analytics info and API to your links...</small>
            <div class="clearfix"></div>
        </div> 
       
        <div id="validated_developer"> 
          <div id="developer-nav-menu">
            <ul>
            <a href="/login"><li id="auth_user_btn" style="width:100%;"><i class="fa fa-key"></i> &nbsp;I Already Have an Account, Login</li></a>
              <!-- <li id="my_apps_btn"><i class="fa fa-book"></i> &nbsp; My Applications</li>
              <li id="secret_key_btn"><i class="fa fa-key"></i> &nbsp; My Secret Keys</li> -->
              <!-- <li id="preferences_key_btn">Preferences</li> -->
            </ul>
            <div class="clearfix"></div>
          </div>

          <div id="analytics-body" style="width:90%;margin:0 auto;">
              
              <form action="" role="form" method="POST" class="form-horizontal" id="register_page_form" style="font-size:14px;">
                <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                        <small><label for="login_firstname">First Name *</label></small>
                        <input class="col-sm-6 col-md-6 form-control" type="text" name="firstname" id="register-firstname" placeholder="First Name" required>
                    </div>

                    <div class="col-sm-6 col-md-6">
                    <small><label for="login_lastname">Last Name *</label></small>
                        <input class="col-sm-6 col-md-6 form-control" type="text" name="lastname" id="register-lastname" placeholder="Last Name" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-12">
                        <small><label for="login_email">Email *</label></small>
                        <input class="col-md-12 form-control" type="email" name="email" id="register-email" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <small><label for="login_password">Password *</label></small>
                        <input class="col-md-12 form-control" type="password" name="password" id="register-password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <small><label for="login_password">Retype Password</label></small>
                        <input class="col-md-12 form-control" type="password" name="password" id="register-password-confirm" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button class="col-md-12 btn btn-primary" id="do_register" type="submit">Register</button>
                        <p id="register_feedback" style="text-align:right;font-size:12px;width:100%;"></p>
                
                        <small style="display:block;width:100%;text-align:right;"><a href="/login">I Already Have an Account, Login</a></small>
                    </div>
                </div>
              </form>
          </div>
        </div>
</div>



<?php
  require_once dirname(__DIR__) . '/layouts/footer.php';
?>