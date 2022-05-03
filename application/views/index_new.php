<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>

<div class="slim-mainpanel">
<div class="signin-wrapper" style="padding: 0 !important;min-height:0">

<div class="signin-box signup"  style="padding:40px;">
<?php if(validation_errors()) { ?>
<div class="alert alert-danger err_all" style=""><?php echo validation_errors(); ?></div>
<?php } ?>
<?php echo form_open('register', ['class' => 'register_form']); ?>

  <h3 class="signin-title-primary">Register!</h3>
  <h5 class="signin-title-secondary lh-4 text-center" style="margin-bottom: 15px;">Signup for Free and Get <span style="color:#FFB612;font-weight:800;">&#8377;100.</span></h5>

  <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">             
            <input type="text" class="form-control" name="username" placeholder="USERNAME" autocomplete="off" required>                
        </div>
    </div>
    <div class="alert alert-danger err_username" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="email" class="form-control" name="email" placeholder="E-MAIL " autocomplete="off" required>
        </div>
    </div><!-- row -->            
    <div class="alert alert-danger err_email" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="number" class="form-control"  name="mobile_number" placeholder="MOBILE NUMBER" autocomplete="off" required>
        </div>
    </div><!-- row -->            
    <div class="alert alert-danger err_mobile_number" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="password" class="form-control" name="password" placeholder="PASSWORD" autocomplete="off" required>
        </div>
    </div><!-- row -->
    <div class="alert alert-danger err_password" style="display:none"></div>

    <div class="alert alert-danger err_all" style="display:none"></div>
    <div class="alert alert-success success_all" style="display:none"></div>

  

    <button class="btn btn-primary btn-block btn-submit">Sign Up</button>
    
    <p class="toc">Aleady have an account? <a href="javascript:void(0)" class="login_required"> Login </a></p>
    <p class="toc">Forgot your password?<a href="javascript:void(0)" class="frgt_pwd_btn">Reset </a></p>
    <p class="toc">BY CLICKING 'SIGN UP' YOU ARE AGREE TO OUR <a href="#">T&C</a></p>
    <div class="signup-separator" style="margin-top:20px"></div>
</form>
</div><!-- signin-box -->

</div>
<?php
    // $this->load->view('layouts/home_slider');
    // $this->load->view('layouts/home_slider_bottom');
    // $this->load->view('layouts/home_pricing');
?>
</div><!-- slim-mainpanel -->
<?php
    $this->load->view('layouts/footer');       
?>
    
  