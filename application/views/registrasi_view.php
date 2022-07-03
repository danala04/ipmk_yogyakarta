<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi Akun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url()?>images/logo mekar.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
						<a href="<?php echo base_url() ?>user"><img src="<?php echo base_url() ?>images/logo mekar.png"
						width="80" title="" style="display: block; margin: auto";/></a><br>
                <form class="login100-form validate-form" action="<?php echo base_url()?>Registrasi" method="post">
                    <span class="login100-form-title p-b-20">
                        Registrasi Akun

                    <h4>IPMK YOGYAKARTA</h4>
                    </span>

                    <form class="user" method="post" action="<?php echo base_url('Registrasi'); ?>">
                                
								<div class="wrap-input100 validate-input m-b-16">
                                    <input type="text" class="form-control form-control-user" id="username" name="username"
                                        placeholder="username" value="<?php echo set_value('username'); ?>">
                                        <?php echo form_error('username', '<small class = "text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                        <?php echo form_error('password1', '<small class = "text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button class="login100-form-btn" type="submit">
                                    Register Account
                                </button>

                    <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login"> Sign In!</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>

 
<!--===============================================================================================-->  
<script src="<?php echo base_url()?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url()?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url()?>assets_login/js/main.js"></script>

</body>
</html>