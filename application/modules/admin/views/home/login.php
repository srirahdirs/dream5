<?php $this->load->view('layouts/login_header'); ?>
<?php $baseUrl = base_url() . 'assets/'; ?>
<div class="signin-wrapper">

    <div class="signin-box">
        <h2 class="slim-logo"><a href="" target="_blank"><img src="<?= $baseUrl ?>/img/logo/logo_white.png" height="105" style="margin-left: 0px;"></a></h2>
        <!-- <h2 class="">Welcome back <span style="color:#FFDD00 ">Admin!</span></h2> -->
        <h3 class="signin-title-secondary"></h3>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="notification success"><?= $this->session->flashdata('success') ?></div>
        <?php } else ?>
        <?php if ($this->session->flashdata('error')) { ?>    
            <div class="parsley-errors-list" style="margin-bottom: 20px;text-align: center"><?= $this->session->flashdata('error') ?></div>
        <?php } ?>
        <form action="<?= base_url() .'admin/login'?>" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
            </div><!-- form-group -->
            <div class="form-group mg-b-50">
                <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">
            </div><!-- form-group -->
            <button class="btn btn-primary btn-block btn-signin">Login</button>
        </form>
    </div><!-- signin-box -->

</div><!-- signin-wrapper -->
<script src="<?=  base_url(); ?>assets/admin/lib/jquery/js/jquery.js"></script>
<script src="<?=  base_url(); ?>assets/admin/lib/popper.js/js/popper.js"></script>
<script src="<?=  base_url(); ?>assets/admin/lib/bootstrap/js/bootstrap.js"></script>

<script src="<?=  base_url(); ?>assets/admin/js/slim.js"></script>

</body>
</html>
