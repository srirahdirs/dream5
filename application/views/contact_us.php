<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>
<div class="signin-wrapper">

      <div class="signin-box signup" style="width: 500px !important;">
        <h3 class="signin-title-primary">Get Started!</h3>
        <h5 class="signin-title-secondary lh-4">Reach us through <a href="">info@dream5.in</a></h5>

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="text" class="form-control" placeholder="Firstname"></div>
          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="text" class="form-control" placeholder="Lastname"></div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="email" class="form-control" placeholder="Email"></div>
          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="password" class="form-control" placeholder="Password"></div>
        </div><!-- row -->

        <button class="btn btn-primary btn-block btn-signin">Sign Up</button>

        <div class="signup-separator"><span>or signup using</span></div>

        <button class="btn btn-facebook btn-block">Sign Up Using Facebook</button>
        <button class="btn btn-twitter btn-block">Sign Up Using Twitter</button>

        <p class="mg-t-40 mg-b-0">Already have an account? <a href="page-signin.html">Sign In</a></p>
      </div><!-- signin-box -->

    </div>

<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";
    $(".sidebar-nav-link").removeClass('active');
    $(".nav-sub-item").removeClass('active');
    $(".my_profile").addClass('active');
    $(".change_password").addClass('active');
    $(".home_main_menu").addClass('active');
    
</script>
