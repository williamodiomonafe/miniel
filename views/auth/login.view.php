<?php
  require_once dirname(__DIR__) . '/layouts/header.php';
?>



    <div id="analytics-box" style="width:50%">
        <div id="analytics-header">
            <h6 class="pull-left"><strong>Login</strong></h6>
            <small class="pull-right">Get access, analytics info and API to your links...</small>
            <div class="clearfix"></div>
        </div> 
       
        <div id="validated_developer"> 
          <div id="developer-nav-menu">
            <ul>
            <a href="/register"><li id="new_user_btn" style="width:100%;"><i class="fa fa-plus"></i> &nbsp; Create an Account</li></a>
              <!-- <li id="my_apps_btn"><i class="fa fa-book"></i> &nbsp; My Applications</li>
              <li id="secret_key_btn"><i class="fa fa-key"></i> &nbsp; My Secret Keys</li> -->
              <!-- <li id="preferences_key_btn">Preferences</li> -->
            </ul>
            <div class="clearfix"></div>
          </div>
          
          <div id="analytics-body" style="width:90%;margin:0 auto;">
          <br>
             <?php
                get_flash('temp_msg');
             ?>
              <form action="" role="form" method="POST" class="form-horizontal" id="login_page_form" style="font-size:14px;">
                <div class="form-group row">
                    <div class="col-md-12">
                        <small><label for="login_email">Email *</label></small>
                        <input class="col-md-12 form-control" type="email" name="email" id="login-email" placeholder="Email" required>
                    </div>
                </div>

                 <div class="form-group row">
                    <div class="col-md-12">
                        <small><label for="login_password">Password *</label></small>
                        <input class="col-md-12 form-control" type="password" name="password" id="login-password" required><br>
                        <input type="checkbox" id="login-page-remember" name="remember" /> <label for="login-page-remember">Remember Me</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col col-md-12">
                        <button class="col-md-12 btn btn-primary" id="do_login" type="submit">Login</button>
                        <p id="login_feedback" style="text-align:right;font-size:12px;width:100%;"></p>

                        <small class="pull-left"><a href="/password_reset">I Have Forgotten My Password</a></small>
                        
                        <small class="pull-right"><a href="/register">No Account Yet? Register</a></small>
                    </div>
                </div>
              </form>
          </div>
        </div>
</div>


<?php
  require_once dirname(__DIR__) . '/layouts/footer.php';
?>