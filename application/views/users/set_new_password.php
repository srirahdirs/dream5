<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>
<div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="slim-pagetitle">Welcome back, BUDDY</h6>
        </div><!-- slim-pageheader -->

        <div class="flex_item form_sheet">
                            <div class="form_excerpt">
                                <h4>Set New Password!</h4>
                                <p>Please fill out your new password.</p>
                            </div>

                            <form action="<?= base_url() .'set-new-password/'.$token?>" method="POST">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">New Password: </label>
                                <input class="form-control" type="password" name="password" placeholder="Enter Newpassword" autocomplete="off">
                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
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
      </div>
      <br>
  <?php $this->load->view('layouts/footer'); ?>
</body>