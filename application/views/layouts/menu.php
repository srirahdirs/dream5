<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="slim-navbar">
    <div class="container">
        <div class="alert alert-danger login_form_err" style="display:none"></div>
        <ul class="nav">
            <li class="nav-item home_main_menu">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-home"></i>
                    <span>Home</span>
                </a>            
            </li>
            <li class="nav-item">
                <?php if ($this->session->userdata('login_status')) { 
                    $class_name = '';
                    $href_play_game = site_url('home');
                    $href_add_cash = site_url('add-cash');
                    $href_withdraw = site_url('withdraw-cash');                    
                    $href_support = site_url('home');
                } else {
                    $class_name = 'login_required';
                    $href_play_game = 'javascript:void(0)';
                    $href_add_cash = 'javascript:void(0)';
                    $href_withdraw = 'javascript:void(0)';
                    $href_support = 'javascript:void(0)';
                }
                ?>
                
                <a class="nav-link play_game <?= $class_name ?>" href="<?= $href_play_game ?>">
                    <i class="icon ion-ios-game-controller-b"></i>
                    <span>PLAY GAME</span>
                </a>    
                
            </li>
            <li class="nav-item add_cash_main_menu">
                <a class="nav-link add_cash <?= $class_name ?>" href="<?= $href_add_cash ?>">
                    <i class="icon ion-cash"></i>
                    <span>ADD CASH</span>
                </a>            
            </li>
            <li class="nav-item withdraw_main_menu">
                <a class="nav-link withdraw <?= $class_name ?>" href="<?= $href_withdraw ?>">
                    <i class="icon ion-briefcase"></i>
                    <span>WITHDRAW</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link winners" href="<?= site_url('home') ?>">
                    <i class="icon ion-trophy"></i>
                    <span>WINNERS</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link support <?= $class_name ?>" href="<?= $href_support ?>">
                    <i class="icon ion-chatboxes"></i>
                    <span>SUPPORT</span>
                    <span class="square-8"></span>
                </a>
            </li>

        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->
<script src="<?= base_url() .'assets/lib/jquery/js/jquery.js'?>"></script>
<script>
    $('.login_required').click(function () {
        $(".login_form_err").css("display","none");
        $.confirm({
            title: 'Login Required!',
            content: '<input type="text" class="form-control" name="username_or_email_ajax" placeholder="USERNAME or EMAIL" autocomplete="off"><br>\n\
                    <input type="password" class="form-control" name="login_password_ajax" placeholder="PASSWORD" autocomplete="off"><br>\n\
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
                                    console.log(data.error);
                                    if (data.error['username_or_email']) {
                                        $("input[name='username_or_email']").focus();
                                        toastr.error(data.error['username_or_email']);
                                        return false;
                                    } else if (data.error['login_password']) {
                                        toastr.error(data.error['login_password']);
                                        $("input[name='login_password']").focus();
                                    } else if (data.error) {
                                        toastr.error(data.error);
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