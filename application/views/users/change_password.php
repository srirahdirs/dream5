<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <label class="section-title">Change Password</label>
<!--            <p class="mg-b-20 mg-sm-b-40">update your personal details</p>-->
            <form action="<?= base_url() . 'change-password/' . $encrypted_user_id ?>" method="POST">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Current Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="password" name="current_password"  placeholder="Enter Current Password" autocomplete="off">
                                <?php echo form_error('current_password', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">New Password: </label>
                                <input class="form-control" type="password" name="new_password" placeholder="Enter Newpassword" autocomplete="off">
                                <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Confirm Password: </label>
                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="off">
                                <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        
                        
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?= base_url() .'home'?>" class="btn btn-secondary bd-0">Cancel</a>
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
    $(".change_password").addClass('active');
    
</script>
