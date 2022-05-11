<?php $baseUrl = base_url() . 'assets'; ?>
<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>
<div class="slim-mainpanel">
    <div class="signin-wrapper" style="padding: 0 !important;min-height:0">

    <div class="signin-box" style="padding:40px;">
        <?php if(validation_errors()) { ?>
            <div class="alert alert-danger err_all" style=""><?php echo validation_errors(); ?></div>
        <?php }  ?>
        <?php if($error != '') { ?>
            <div class="alert alert-danger err_all" style=""><?php echo $error; ?></div>
        <?php }  ?>
        <h2 class="signin-title-primary" style="margin-bottom: 25px;">Sign in!</h2>
        <!-- <h3 class="signin-title-secondary">Sign in to continue.</h3> -->
        <?php echo form_open('login', ['class' => 'login_form']); ?>
            <div class="form-group">
            <input type="text" class="form-control" name="username_or_email" placeholder="USERNAME or EMAIL" required>  
            </div><!-- form-group -->
            <div class="row row-xs mg-b-10">
                <div class="col-sm mg-t-10 mg-sm-t-0">
                    <div class="toggle-sec">
                    <input type="password" class="form-control password" name="login_password" placeholder="PASSWORD" autocomplete="off" required value="<?php echo set_value('password');?>">
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>
                </div>
            </div><!-- row -->
            <button class="btn btn-primary btn-block btn-signin">Sign In</button>
        <?php echo form_close(); ?>
        <p class="mg-b-0">Don't have an account? <a href="<?= base_url('register'); ?>">Sign Up</a></p>
    </div><!-- signin-box -->

    </div>
</div>
<script>
    $(document).ready(function(){
    $("#togglePassword").on('click',function() {
        jQuery('#togglePassword').toggleClass("bi-eye");
        var input = $(".password");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
</script>
<?php
    $this->load->view('layouts/footer');       
?>
<style>
    .fa-passwd-reset > .fa-lock {
        font-size: 0.85rem;
    }
</style>
