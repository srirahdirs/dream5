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
<title>DREAM5 - Edit Upi</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/upi') ?>">Upi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
            <h6 class="slim-pagetitle">Upi</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <form method="post" action="<?php echo base_url('admin/upi/edit/') .$upi->id; ?>">
                <label class="section-title">Edit Upi</label>
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
                                    <option value="Gpay"<?php if($upi->status == 'Gpay') { ?> selected="selected"<?php } ?>>Gpay</option>                                    
                                    <option value="Phonepe"<?php if($upi->status == 'Phonepe') { ?> selected="selected"<?php } ?>>Phonepe</option>                                    
                                    <option value="Paytm"<?php if($upi->status == 'Paytm') { ?> selected="selected"<?php } ?>>Paytm</option>                                    
                                    <option value="Bhim"<?php if($upi->status == 'Bhim') { ?> selected="selected"<?php } ?>>Bhim</option>                                    
                                </select>
                                <?php echo form_error('upi_method', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">UPI Id<span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'upi_id', 'class' => 'form-control', 'placeholder' => 'sruthi@okaxis','autocomplete' => "off", 'value' => $upi->upi_id)); ?>
                                <?php echo form_error('upi_id', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                <select class="form-control" name="status" tabindex="-1" aria-hidden="true">
                                    <option value="Active"<?php if($upi->status == 'Active') { ?> selected="selected"<?php } ?>>Active</option>                                    
                                    <option value="Inactive"<?php if($upi->status == 'Inactive') { ?> selected="selected"<?php } ?>>Inactive</option>                                    
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
    $('.upi_master').addClass("active");
</script>