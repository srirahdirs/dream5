<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $baseUrl = base_url() . 'assets'; ?>
<div class="signin-box signup register_page">
    <?php echo form_open('register', ['class' => 'register_form']); ?> 
    <h3 class="signin-title-primary">REGISTER!</h3>


    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">             
            <input type="text" class="form-control" name="username" placeholder="USERNAME" autocomplete="off">                
        </div>
    </div>
    <div class="alert alert-danger err_username" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="email" class="form-control" name="email" placeholder="E-MAIL " autocomplete="off">
        </div>
    </div><!-- row -->            
    <div class="alert alert-danger err_email" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="number" class="form-control"  name="mobile_number" placeholder="MOBILE NUMBER" autocomplete="off">
        </div>
    </div><!-- row -->            
    <div class="alert alert-danger err_mobile_number" style="display:none"></div>

    <div class="row row-xs mg-b-10">
        <div class="col-sm mg-t-10 mg-sm-t-0">
            <input type="password" class="form-control" name="password" placeholder="PASSWORD" autocomplete="off">
        </div>
    </div><!-- row -->
    <div class="alert alert-danger err_password" style="display:none"></div>

    <div class="alert alert-danger err_all" style="display:none"></div>
    <div class="alert alert-success success_all" style="display:none"></div>

    <button class="btn btn-primary btn-block btn-submit">Sign Up</button>
    <p class="toc">Aleady have an account? <a href="javascript:void(0)" class="login_required"> Login </a></p>
    <p class="toc">Forgot your password?<a href="javascript:void(0)" class="frgt_pwd_btn">Reset </a></p>
    <p class="toc">BY CLICKING 'SIGN UP' YOU ACCEPT YOU ARE <b>18+</b> AND AGREE TO OUR <a href="#">T&C</a></p>
</form>
<!--
        <div class="signup-separator"><span>or signup using</span></div>

        <button class="btn btn-facebook btn-block">Sign Up Using Facebook</button>        

        <p class="mg-t-40 mg-b-0">Already have an account? <a href="page-signin.html">Sign In</a></p>-->
</div>
<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>
<script>
    $('.login_required').click(function (e) {
        $(".login_form_err").css("display","none");
        $("#display_error").css("display","none");
            $.confirm({
            title: 'Login Required!',
            content: '<input type="text" class="form-control" name="username_or_email_ajax" placeholder="USERNAME or EMAIL" autocomplete="off"><br>\n\
                    <input type="password" class="form-control" name="login_password_ajax" placeholder="PASSWORD" autocomplete="off">\n\
                    <span style="color:red;margin-top:5px" id="display_error"></span>\n\
                    ',
            buttons: {
                somethingElse: {
                    text: 'Login',
                    btnClass: 'btn-default',
                    keys: ['enter', 'shift'],
                    action: function () {

                        var username_or_email = $("input[name='username_or_email_ajax']").val();
                        var login_password = $("input[name='login_password_ajax']").val();
                        if(username_or_email == ''){ 
                           $("input[name='username_or_email_ajax']").focus();
                           return false;
                        }
                        if(login_password == ''){ 
                           $("input[name='login_password_ajax']").focus();
                           return false;
                        }
                        
                        $.ajax({
                            url: '<?= base_url() . 'login' ?>',
                            type: 'POST',
                            dataType: "json",
                            data: {username_or_email: username_or_email, login_password: login_password},
                            success: function (data) {
                                toastr.clear();
                                
                                if ($.isEmptyObject(data.error)) {
                                    $(".alert-danger").css('display', 'none');
                                    location.href = "<?php echo base_url('home'); ?>";
                                } else {
                                    $("#display_error").css("display","block");
                                    e.preventDefault(); 
                                    if (data.error['username_or_email']) {
                                        $("input[name='username_or_email_ajax']").focus();
                                        toastr.error(data.error['username_or_email']);
                                        $("#display_error").html(data.error['username_or_email']);
                                        return false;
                                    } else if (data.error['login_password']) {
                                        toastr.error(data.error['login_password']);
                                        $("input[name='username_or_email_ajax']").focus();
                                        $("#display_error").html(data.error['login_password']);
                                    } else if (data.error) {
                                        toastr.error(data.error);
                                        $("#display_error").html(data.error);
                                        return false;
                                    } else {
                                        $(".login_form_err").css('display', 'none');
                                    }
                                } //else                                
                            } //success                            
                        });
                        return false; //confirm popup willnot close
                    }
                },
                cancel: function () {

                },
            },
        }); //confirm e
    });
</script>
<script type="text/javascript">


    $(document).ready(function () {

        $(".btn-submit").click(function (e) {

            e.preventDefault();

            var username = $("input[name='username']").val();

            var email = $("input[name='email']").val();

            var mobile_number = $("input[name='mobile_number']").val();            
            
            var password = $("input[name='password']").val();

            
            $.ajax({

                url: $(this).closest('form').attr('action'),

                type: $(this).closest('form').attr('method'),

                dataType: "json",

                data: {username: username, email: email, mobile_number: mobile_number, password: password},

                success: function (data) {

                    if ($.isEmptyObject(data.error)) {
                        $(".alert-danger").css('display', 'none');
                        // alert(data.success);
                        toastr.success(data.success);
                        location.reload();
                    } else {
                        if (data.error['username']) {
                            $(".err_username").css('display', 'block');
                            $(".err_username").html(data.error['username']);
                        } else {
                            $(".err_username").css('display', 'none');
                        }
                        if (data.error['email']) {
                            $(".err_email").css('display', 'block');
                            $(".err_email").html(data.error['email']);
                        } else {
                            $(".err_email").css('display', 'none');
                        }
                        if (data.error['mobile_number']) {
                            $(".err_mobile_number").css('display', 'block');
                            $(".err_mobile_number").html(data.error['mobile_number']);
                        } else {
                            $(".err_mobile_number").css('display', 'none');
                        }
                        if (data.error['password']) {
                            $(".err_password").css('display', 'block');
                            $(".err_password").html(data.error['password']);
                        } else {
                            $(".err_password").css('display', 'none');
                        }



                    }

                }

            });

        });

    });


</script>