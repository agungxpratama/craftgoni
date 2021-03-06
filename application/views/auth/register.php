<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Register - Flexor Bootstrap Theme</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/icons/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/icons/default.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url('assets/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url('assets/'); ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

  <!--Your custom colour override - predefined colours are: colour-blue.css, colour-green.css, colour-lavander.css, orange is default-->
  <link href="#" id="colour-scheme" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Flexor
    Theme URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<!-- ======== @Region: body ======== -->

<body class="fullscreen-centered page-register">
  <!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
  <div id="background-wrapper" class="benches" data-stellar-background-ratio="0.8">

    <!-- ======== @Region: #content ======== -->
    <div id="content">
      <div class="header">
        <div class="header-inner">
          <!--navbar-branding/logo - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
          <a class="navbar-brand center-block" href="index.html" title="Home">
            <h1 class="hidden">
                <img src="img/logo.png" alt="Flexor Logo">
                Flexor
              </h1>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                  Sign Up
                </h3>
            </div>
            <div class="panel-body">
                <?php
                    if ($this->session->flashdata('flash_message')) {
                       ?>
                       <div class="alert alert-<?= $this->session->flashdata('type'); ?>" role="alert">
                           <?= $this->session->flashdata('flash_message'); ?>
                       </div>
                       <?php
                    }
                ?>
              <form accept-charset="UTF-8" role="form" action="<?= base_url('index.php/auth/action_register');?>" method="post">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Full Name" name="full_name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                      <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                      <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <!-- <div class="radio">
                      <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                          Free Account
                        </label>
                    </div> -->
                    <!-- <div class="radio">
                      <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          Plus Account ($12/month)
                        </label>
                    </div> -->
                    <!-- <div class="radio">
                      <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                          Corporate Account ($100month)
                        </label>
                    </div> -->
                  </div>
                  <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Terms">
                        I agree to the <a href="#">terms and conditions</a>.
                      </label>
                  </div>
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Me Up">
                </fieldset>
              </form>
              <p class="m-b-0 m-t">Already signed up? <a href="<?= base_url()?>index.php/auth">Login here</a>.</p>
              <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flexor
            -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
  </div>
  <!-- Required JavaScript Libraries -->
  <script src="<?= base_url('assets/'); ?>lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/'); ?>lib/stellar/stellar.min.js"></script>
  <script src="<?= base_url('assets/'); ?>lib/waypoints/waypoints.min.js"></script>
  <script src="<?= base_url('assets/'); ?>lib/counterup/counterup.min.js"></script>
  <script src="<?= base_url('assets/'); ?>contactform/contactform.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="<?= base_url('assets/'); ?>js/custom.js"></script>

  <!--Custom scripts demo background & colour switcher - OPTIONAL -->
  <script src="<?= base_url('assets/'); ?>js/color-switcher.js"></script>

  <!--Contactform script -->
  <script src="<?= base_url('assets/'); ?>contactform/contactform.js"></script>

</body>

</html>
