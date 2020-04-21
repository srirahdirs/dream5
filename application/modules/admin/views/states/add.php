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
<title>Tandem - Add Country</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/countries') ?>">Countries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
            <h6 class="slim-pagetitle">Country</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <form method="post" action="<?php echo base_url('admin/countries/add'); ?>">
                <label class="section-title">Add Country</label>
                <div class="parsley-errors-list">
                    <?php //echo validation_errors(); ?>
                </div>
                <?php //echo form_open('form');  ?>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'country', 'class' => 'form-control', 'placeholder' => 'Country Name','autocomplete' => "off", 'value' => set_value('country'))); ?>
                                <?php echo form_error('country', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status:<span
                                        class="tx-danger">*</span></label>
                                <div class=row style="margin-top:10px;">
                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input name="status" type="radio" value=1 <?php echo $this->form_validation->set_radio('status', 1); ?>>
                                            <span>Active</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input name="status" type="radio" value=0 <?php echo $this->form_validation->set_radio('status', 0); ?>>
                                            <span>Inactive</span>
                                        </label>
                                    </div>
                                </div>
                                <?php echo form_error('status', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>




                        <!-- col-8 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?php echo base_url('admin/countries'); ?>" class="btn btn-secondary bd-0">Cancel</a>
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
    $('.countries').addClass("active");
</script>