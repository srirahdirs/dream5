<?php $baseUrl = base_url() . 'assets'; ?>
<div class="login-box">

    <?php echo form_open('login', ['class' => 'login_form']); ?>
    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="form-group">             
                <input type="text" class="form-control" name="username_or_email" placeholder="USERNAME or EMAIL" autocomplete="off">                
            </div>
        </div>


        <div class="col-lg-4 col-sm-4">
            <div class="form-group">
                <input type="password" class="form-control" name="login_password" placeholder="PASSWORD" autocomplete="off">
            </div>
        </div><!-- row -->

        <div class="col-lg-1 mg-t-20 mg-lg-t-0 col-sm-1">
            <div class="btn-group" role="group" aria-label="Basic example">                  
                <button type="button" class="btn btn-secondary active frgt_pwd_btn">
                    <span class="fa-passwd-reset fa-stack">
                        <i class="fa fa-undo fa-stack-2x"></i>
                        <i class="fa fa-lock fa-stack-1x"></i>
                    </span>
                </button>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3">
            <button class="btn btn-primary btn-block btn-login">Login</button>
        </div>
    </div>
<?php echo form_close(); ?>

</div>
<style>
    .fa-passwd-reset > .fa-lock {
        font-size: 0.85rem;
    }
</style>
<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-login").click(function (e) {
            e.preventDefault();
            var username_or_email = $("input[name='username_or_email']").val();
            var login_password = $("input[name='login_password']").val();

            $.ajax({
                url: $(this).closest('form').attr('action'),
                type: $(this).closest('form').attr('method'),
                dataType: "json",
                data: {username_or_email: username_or_email, login_password: login_password},
                success: function (data) {
                    toastr.clear();
                    if ($.isEmptyObject(data.error)) {
                        $(".alert-danger").css('display', 'none');
                        location.href = "<?php echo base_url('home'); ?>";
                    } else {
                        console.log(data.error);
                        if (data.error['username_or_email']) {
//                            $(".login_form_err").css('display', 'block');
//                            $(".login_form_err").html(data.error['username_or_email']);
//                            $('.register_page').css("top", "28.9%");
                            $("input[name='username_or_email']").focus();
                            toastr.error(data.error['username_or_email']);

                        } else if (data.error['login_password']) {
//                            $(".login_form_err").css('display', 'block');
//                            $(".login_form_err").html(data.error['login_password']);
                            toastr.error(data.error['login_password']);
                            $("input[name='login_password']").focus();
                        } else if (data.error) {
//                            $(".login_form_err").css('display', 'block');
                            toastr.error(data.error);
//                            $(".login_form_err").html(data.error);
                        } else {
                            $(".login_form_err").css('display', 'none');
                        }
                    } //else

                } //success

            });
            return false; //confirm popup willnot close

        });
        $(".frgt_pwd_btn").click(function () {            
            $.confirm({
                animationSpeed: 2000,
                title: 'Forgot Password?',
                content: '<input type="text" class="form-control" name="email" id="email_id" placeholder="Enter Email or Mobile Number " required autocomplete="off">',
                buttons: {
                    
                    SENDMAIL: function () {                    
                        if($('#email_id').val() === '') {
                            $('#email_id').focus();
                            toastr.error('Enter Email Or Mobile Number');
                            return false;
                        } else {
                            $.ajax({
                                url: '<?= base_url() .'forgot-password'?>',
                                type: 'post',
                                data: {email_or_phonenumber: $('#email_id').val()},
                                success: function (response) {
                                    
                                    
                                    if(response == 'invalid_mobile_or_email'){
                                        $('#email_id').focus();    
                                        $(".err_all").css('display', 'block');                                       
                                        $(".err_all").html('Invalid email or mobile number');
                                        toastr.error('Invalid email or mobile number');
                                        return false;
                                    }
                                    if(response == 'mobile_number_not_exists'){
                                        $('#email_id').focus();
                                        $(".err_all").css('display', 'block');      
                                        $(".err_all").html('Mobile number not exists');
                                        toastr.error('Mobile number not exists');
                                        return false;
                                    }
                                    if(response == 'email_not_exists'){
                                        $('#email_id').focus();
                                        $(".err_all").css('display', 'block');  
                                        $(".err_all").html('Email not exists');    
                                        toastr.error('Email not exists');
                                        return false;
                                    }
                                    if(response == 'mail_sent'){                                        
                                        toastr.success('Email has been sent');  
                                        $(".success_all").css('display', 'block');   
                                        $(".success_all").html('Email has been sent');
                                        setTimeout(function(){ location.reload(); }, 3000);
                                    }
                                }
                            });

                        }  // else ends    
                        return false;
                    }, //confirm btn ends
                    cancel: function () {

                    },
                },
            }); //confirm e
        });
    });


</script>