<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>
<div class="signin-wrapper" style="min-height:0 !important;">

      <div class="signin-box signup" style="width: 600px !important;">
        <h3 class="signin-title-primary">Reach US!</h3>
        <h5 class="signin-title-secondary lh-4" style="text-align:center;">E-mail us through <a href="">info@dream5.in</a></h5>

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="text" required class="form-control" id="first_name" placeholder="First Name" required></div>
          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="text" class="form-control" id="last_name"  placeholder="Last Name"></div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="email"  required class="form-control" id="email"  placeholder="Email" required></div>
          <div class="col-sm mg-t-10 mg-sm-t-0"><input required type="number" id="mobile_number" class="form-control" placeholder="Mobile Number" required></div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
        <div class="col-sm"><textarea rows="4" id="user_query"  required class="form-control" placeholder="Write your query..."></textarea></div>
        </div>  

        <button class="btn btn-primary btn-block btn-signin send_btn">Send</button>
      </div><!-- signin-box -->

    </div>

<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'> 
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
