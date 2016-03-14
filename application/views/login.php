<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>SDC | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="Nhan Nguyen" name="author" />
        
        <style type="text/css">
          @font-face {
            font-family: "Open Sans";
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Light.eot");
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Light.eot?iefix") format("eot"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Light.woff") format("woff"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Light.svg") format("svg"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Light.ttf") format("truetype");
            font-weight:300;
          }
          @font-face {
            font-family: "Open Sans";
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans.eot");
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans.eot?iefix") format("eot"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans.woff") format("woff"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans.svg") format("svg"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans.ttf") format("truetype");
            font-weight:400;
          }
          @font-face {
            font-family: "Open Sans";
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Semibold.eot");
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Semibold.eot?iefix") format("eot"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Semibold.woff") format("woff"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Semibold.svg") format("svg"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Semibold.ttf") format("truetype");
            font-weight:600;
          }
          @font-face {
            font-family: "Open Sans";
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Bold.eot");
            src: url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Bold.eot?iefix") format("eot"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Bold.woff") format("woff"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Bold.svg") format("svg"),
               url("<?php echo ASSETS_PATH ?>/fonts/OpenSans-Bold.ttf") format("truetype");
            font-weight:700;
          }
        </style>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo asset_url() ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url() ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url() ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url() ?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url() ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo asset_url() ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset_url() ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo asset_url() ?>global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo asset_url() ?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo asset_url() ?>pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <!-- <img src="<?php echo asset_url() ?>pages/img/logo-big.png" alt="" />  -->
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo base_url('auth/login') ?>" method="post">
                <h3 class="form-title">Đăng nhập hệ thống</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Cần nhập tên đăng nhập và mật khẩu </span>
                </div>
                <?php if (isset($message) && !empty($message)) { ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo $message ?> </span>
                </div>
                <?php } ?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Tên đăng nhập</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Tên đăng nhập" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="0" /> Ghi nhớ cho lần đăng nhập sau </label>
                    <button type="submit" class="btn green pull-right"> Đăng nhập </button>
                </div>
                <div class="form-actions"></div>
                <?php echo $localIP; ?>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2016 &copy; Trung tâm phát triển phần mềm </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
        <script src="<?php echo asset_url() ?>global/plugins/respond.min.js"></script>
        <script src="<?php echo asset_url() ?>global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo asset_url() ?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo asset_url() ?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo asset_url() ?>global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo asset_url() ?>global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo asset_url() ?>pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>