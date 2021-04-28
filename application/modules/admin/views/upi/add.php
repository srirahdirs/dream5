<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>
<title>DREAM5 - Add UPI</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/upi') ?>">Upi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
            <h6 class="slim-pagetitle">Upi</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <form method="post" action="<?php echo base_url('admin/upi/add'); ?>">
                <label class="section-title">Add UPI Details</label>
                <div class="parsley-errors-list">
                    <?php //echo validation_errors(); ?>
                </div>
                <?php //echo form_open('form');  ?>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Upi Method <span class="tx-danger">*</span></label>
                                <select class="form-control" name="upi_method" tabindex="-1" aria-hidden="true">
                                    <option value="Gpay">Gpay</option>                                    
                                    <option value="Phonepe">Phonepe</option>                                    
                                    <option value="Paytm">Paytm</option>                                    
                                    <option value="Bhim">Bhim</option>                                    
                                </select>
                                <?php echo form_error('status', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">UPI Id<span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'upi_id', 'class' => 'form-control', 'placeholder' => 'sruthi@okaxis','autocomplete' => "off", 'value' => set_value('game_type'))); ?>
                                <?php echo form_error('upi_id', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                <select class="form-control" name="status" tabindex="-1" aria-hidden="true">
                                    <option value="Active">Active</option>                                    
                                    <option value="Inactive">Inactive</option>                                    
                                </select>
                                <?php echo form_error('status', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>




                        <!-- col-8 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?php echo base_url('admin/upi'); ?>" class="btn btn-secondary bd-0">Cancel</a>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form><!-- form -->
        </div><!-- section-wrapper -->



    </div><!-- container -->
</div>
<?php
$this->load->view('layouts/footer');
?>
<script>
    $('.sidebar-nav-link').removeClass("active");
    $('.masters').addClass("active");
    $('.upi').addClass("active");
</script>