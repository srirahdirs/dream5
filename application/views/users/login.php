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
            <input type="text" class="form-control" name="username_or_email" placeholder="USERNAME or EMAIL" autocomplete="off" required>  
            </div><!-- form-group -->
            <div class="form-group mg-b-50" style="margin-bottom: 25px;">
            <input type="password" class="form-control" name="login_password" placeholder="PASSWORD" autocomplete="off" required>
            </div><!-- form-group -->
            <button class="btn btn-primary btn-block btn-signin">Sign In</button>
        <?php echo form_close(); ?>
        <p class="mg-b-0">Don't have an account? <a href="<?= base_url('register'); ?>">Sign Up</a></p>
    </div><!-- signin-box -->

    </div>
</div>
<?php
    $this->load->view('layouts/footer');       
?>
<style>
    .fa-passwd-reset > .fa-lock {
        font-size: 0.85rem;
    }
</style>
<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".frgt_pwd_btn").click(function () {            
            $.confirm({
                title: 'Forgot Password or Username?',
                content: '<input type="text" class="form-control" name="email" id="email_id" placeholder="Enter Email or Mobile Number" required>',
                buttons: {
                    confirm: function () {                    
                        if($('#email_id').val() === '') {
                            $('#email_id').focus();
                            return false;
                        } else {
                            $.ajax({
                                url: '',
                                type: 'post',
                                data: {email: $('#email_id').val()},
                                success: function (data) { location.reload();}
                            });

                        }  // else ends            
                    }, //confirm btn ends
                    cancel: function () {

                    },
                },
            }); //confirm e
        });
    });


</script>