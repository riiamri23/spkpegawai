<link href="<?php echo base_url()?>Asset/Css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url()?>Asset/Js/bootstrap.min.js"></script>

<!DOCTYPE html>
<html>
    
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>LOGIN APP PENERIMAAN Pegawai</title>
	
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url()?>Asset/label/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>Asset/label/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url()?>Asset/label/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="<?php echo base_url()?>Asset/label/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="<?php echo base_url()?>Asset/label/images/favicon.ico" />

</head>
<!--Coded with love by Mutiullah Samim-->

<body>
	<!-- <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url()?>/Asset/images/unnamed.jpeg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form   method="post"  action="<?php echo base_url()?>login/proses">
						<div class="input-group mb-3">
							 <?php echo $this->session->flashdata('Pesan'); ?> 
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" required="" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" required="" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<input type="submit" class="btn login_btn" name="login" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->
    <div class="authentication-theme auth-style_1">
      <div class="row">
        <div class="col-12 logo-section">
          <a href="<?php echo base_url()?>" class="logo">
            <img src="<?php echo base_url()?>Asset/images/unnamed.jpeg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                <form method="post"  action="<?php echo base_url()?>login/proses">
                    <div class="input-group mb-3">
                        <?php echo $this->session->flashdata('Pesan'); ?> 
                    </div>
                    <div class="form-group input-rounded">
                      <input type="text" class="form-control" placeholder="Username"  name="username" required="" value="" />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" class="form-control" placeholder="Password"  name="pass" required="" value="" />
                    </div>
                    <div class="form-inline">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="form-check-input" />Remember me <i class="input-frame"></i>
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                  </form>
                  <div class="signup-link">
                    <!-- <p>Don't have an account yet?</p>
                    <a href="#">Sign Up</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth_footer">
        <!-- <p class="text-muted text-center">© Label Inc 2019</p> -->
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="<?php echo base_url()?>Asset/label/vendors/js/core.js"></script>
    <script src="<?php echo base_url()?>Asset/label/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <!-- <script src="Asset/label/js/template.js"></script> -->
    <!-- endbuild -->
	    
</body>
</html>
