<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <label class="section-title">Profile Update</label>
            <p class="mg-b-20 mg-sm-b-40">update your personal details</p>
            <form action="<?= base_url() . 'my-profile/' . $encrypted_user_id ?>" method="POST">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name"  placeholder="Enter Firstname" value="<?= $user->first_name ?>" autocomplete="off">
                                <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Last Name: </label>
                                <input class="form-control" type="text" name="last_name" placeholder="Enter Lastname" value="<?= $user->last_name ?>" autocomplete="off">
                                <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select state" name="gender">
                                    <option value="">Select Gender</option>                                    
                                    <option value="Male" <?php if($user->gender == 'Male'){    echo 'selected'; }?>>Male</option>
                                    <option value="Female" <?php if($user->gender == 'Female'){    echo 'selected'; }?>>Female</option>                                                             
                                </select> 
                                <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Enter Email address" value="<?= $user->email ?>" disabled autocomplete="off" id="email_id">
                                <span style="display: none">Please check your mobile.</span>
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label hide_label">LABEL HIDDEN</label>
                                <button class="btn btn-primary bd-0" id="email_update">Update</button>                             
                            </div>
                        </div><!-- col 2 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="mobile_number" placeholder="Enter mobile number" value="<?= $user->mobile_number ?>" disabled autocomplete="off" id="mobile_number">
                                <span style="display: none">Please check your email.</span>
                                <?php echo form_error('mobile_number', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label hide_label">LABEL HIDDEN</label>
                                <button class="btn btn-primary bd-0" id="mobile_number_update">Update</button>                              
                            </div>
                        </div><!-- col 2 -->
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" type="text" name="address" ><?= $user->address ?></textarea>
                                <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select state" name="state_id" id="state_id">
                                    <option value="">Select State</option>
                                    <?php
                                    foreach ($state_list as $state):
                                        if ($user->state_id == $state['state_code']) {
                                            $selected_state = 'selected=selected';
                                        } else {
                                            $selected_state = '';
                                        }
                                        ?>
                                        <option value="<?= $state['state_code'] ?>" <?= $selected_state ?>><?= $state['state_name'] ?></option>
                                    <?php endforeach; ?>                               
                                </select> 
                                <?php echo form_error('state_id', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-hidden-accessible" name="city_id" id="city">
                                    <option value="">Select City</option>                                                            
                                </select> 
                                <?php echo form_error('city_id', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-6 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?= base_url() . 'home' ?>" class="btn btn-secondary bd-0">Cancel</a>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form><!-- form-layout -->
        </div>
    </div><!-- container -->

</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";
    $(".sidebar-nav-link").removeClass('active');
    $(".nav-sub-item").removeClass('active');
    $(".my_profile").addClass('active');
    $(".edit_profile").addClass('active');
    $(".home_main_menu").addClass('active');
    $(document).ready(function () {
        var state = $('#state_id').val();

        // AJAX request
        $.ajax({
            url: '<?= base_url() ?>getSelectedCityList',
            method: 'post',
            data: {state_code: state},
            success: function (response) {
                console.log(response);
                // Add options
                $('#city_id').find('option').not(':first').remove();
                $('#city').html(response);

            }
        });
        // state change
        $('#state_id').change(function () {
            var state = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>getCityList',
                method: 'post',
                data: {state_code: state},
                dataType: 'json',
                success: function (response) {
                    $('#city').html('');
                    $.each(response, function (index, data) {
                        $('#city').append('<option value="' + data['city_code'] + '">' + data['city_name'] + '</option>');
                    });

                }
            });
        });


    });


    $('#mobile_number_update').click(function (e) {
        e.preventDefault();
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to update ?.',
            buttons: {
                confirm: function () {
                    $("#mobile_number_update").css("display", "none");
//                    $("#mobile_number").next("span").css({display: "inline", color: "#FFB612"}).fadeOut(5000);
                    $("#mobile_number").attr("disabled",false);
                    $("#mobile_number").focus();
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    });
    $('#email_update').click(function (e) {
        e.preventDefault();
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to update ?.',
            buttons: {
                confirm: function () {
                    $("#email_update").css("display", "none");
                    $("#email_id").attr("disabled",false);
                    $("#email_id").focus();
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    });
</script>
