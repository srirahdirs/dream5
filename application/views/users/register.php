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


    <button class="btn btn-primary btn-block btn-submit">Sign Up</button>
    <p class="toc">BY CLICKING 'SIGN UP' YOU ACCEPT YOU ARE <b>18+</b> AND AGREE TO OUR <a href="#">T&C</a></p>
</form>
<!--
        <div class="signup-separator"><span>or signup using</span></div>

        <button class="btn btn-facebook btn-block">Sign Up Using Facebook</button>        

        <p class="mg-t-40 mg-b-0">Already have an account? <a href="page-signin.html">Sign In</a></p>-->
</div>
<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>
<script type="text/javascript">


    $(document).ready(function () {

        $(".btn-submit").click(function (e) {

            e.preventDefault();
            $(".err_password").css('display', 'none');
            $(".err_username").css('display', 'none');
            $(".err_mobile_number").css('display', 'none');
            $(".err_email").css('display', 'none');
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
                        toastr.clear();
                        toastr.success("Your account has been created");//                        
                        setTimeout(function(){ location.reload(); }, 1000);

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