<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');

?>
<div class="slim-mainpanel">
    <div class="container pd-t-50">
      <div class="manager-header">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                </ol>
                <h6 class="slim-pagetitle">Play <span style="color: #23BF08">DREAM<span style="color:#FFB612"><b>5</b></span></span> With Friends For Free</h6>
            </div><!-- slim-pageheader -->
            <a id="contactNavicon" href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
      </div>
      <!-- <div class="row"> -->
          <img src="<?= $baseUrl .'/img/referral_banner.jpg'?>" alt="banner" class="refer_banner_img" width="870" height="223">
      <!-- </div> -->
      <div class="card card-profile">
        <?php
        $link = base_url() .'buddy-register?name='.$this->session->userdata('username');
        $referralLink = 'Get INR 500 instantly Join India'."'".'s Trusted Gaming, betting website. Use my code '.$this->session->userdata('username').' or go to ('.$link.') Strike it rich @ www.DREAM5.in';
        ?>
            <div class="card-body">
              <a href=""><img src="../img/img6.jpg" alt=""></a>
              <h4 class="profile-name">Invite Now</h4>
              <p class="mg-b-20">Get &#8377;500</p>
              <p class="mg-b-20">Your friend(s) needs to successfully register via Referral link/Referral Code shared by you.
                Your referral code is <span style="color:#FFB612"><b><?= $this->session->userdata('username') ?></b></span> <br> Your Referral Cashback journey starts with your friend’s game play after his/her 1st deposit & 1st withdrawal. </p>
              <p class="profile-links">
                  <a href="whatsapp://send?text=<?= $referralLink ?>" title="DREAM5 Share on whatsapp"><img style="width:70px !important" src="<?= $baseUrl .'/img/whatsappupdated.svg'?>" alt="whatsapp" ></a>
              </p>
              <div class="col-lg-12" style="margin-top:35px;">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Link</span>
                            </div>
                            <input type="text" class="form-control" id="referral_link" value="<?= $link ?>">
                            <div class="input-group-append">
                                <span class="input-group-text"><a onclick="myFunction()"><i class="fa fa-copy" style="font-size:24px"></i></a></span>
                            </div>
                        </div>
              </div>
            </div><!-- card-body -->
      </div>   <!--card profile -->
    </div>
</div>
</div>
<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'>
function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("referral_link");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    toastr.success("Referral Link Copied.");
    } 
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
$('.send_btn').click(function (e) {
  e.preventDefault();
  var first_name = $("#first_name").val();
  var last_name = $("#last_name").val();
  var email = $("#email").val();
  var mobile_number = $("#mobile_number").val();
  var user_query = $("#user_query").val();
  if(first_name == ''){
    toastr.error('First Name Required!');
    $("#first_name").focus();
    return false;
  }
  if(last_name == ''){
    toastr.error('Last Name Required!');
    $("#last_name").focus();
    return false;
  }
  if(email == ''){
    toastr.error('Email Required!');
    $("#email").focus();
    return false;
  }
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
   if(!emailReg.test(email)) {  
      toastr.error('Please enter valid email id');
      return false;
   }  
  if(mobile_number == ''){
    toastr.error('Mobile Number Required!');
    $("#mobile_number").focus();
    return false;
  }
  if(user_query == ''){
    toastr.error('Query Required!');
    $("#user_query").focus();
    return false;
  }
  $.ajax({
    url: '<?= base_url() ?>common/contactUsSave',
    method: 'post',
    data: {first_name: first_name,last_name: last_name,email: email,mobile_number: mobile_number,user_query: user_query},
    success: function (result) {  
      toastr.success('Email sent!...');
      location.reload();
    }
  });      
        
});

    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";
    $(".sidebar-nav-link").removeClass('active');
    $(".nav-sub-item").removeClass('active');
    $(".my_profile").addClass('active');
    $(".change_password").addClass('active');
    $(".home_main_menu").addClass('active');
    
</script>
