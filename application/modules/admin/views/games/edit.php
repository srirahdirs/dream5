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
<title>DREAM5 - Edit Game</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/games') ?>">Games</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
            <h6 class="slim-pagetitle">Games</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <form method="post" action="<?php echo base_url('admin/games/edit/') .$games->id; ?>">
                <label class="section-title">Edit Game</label>
                <div class="parsley-errors-list">
                    <?php //echo validation_errors(); ?>
                </div>
                <?php //echo form_open('form');  ?>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Category <span class="tx-danger">*</span></label>
                                <select class="form-control" name="category" tabindex="-1" aria-hidden="true">
                                    <option value="Cricket">Cricket</option>                                    
                                </select>
                                <?php echo form_error('category', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Game Type <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'game_type', 'class' => 'form-control', 'placeholder' => 'Game Type','autocomplete' => "off", 'value' => $games->game_type )); ?>
                                <?php echo form_error('game_type', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Team A: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'team_a', 'class' => 'form-control', 'placeholder' => 'Team A','autocomplete' => "off", 'value' => $games->team_a )); ?>
                                <?php echo form_error('team_a', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Team B: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'team_b', 'class' => 'form-control', 'placeholder' => 'Team B','autocomplete' => "off", 'value' => $games->team_b )); ?>
                                <?php echo form_error('team_b', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Match Date & Time: <span class="tx-danger">*</span></label>
                                <input type="datetime-local" id="birthdaytime" name="match_date_time" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($games->match_date_time)) ?>">
                                <?php echo form_error('match_date_time', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                <select class="form-control" name="status" tabindex="-1" aria-hidden="true">
                                    <option value="Upcoming"<?php if($games->status == 'Upcoming') { ?> selected="selected"<?php } ?>>Upcoming</option>                                    
                                    <option value="Live"<?php if($games->status == 'Live') { ?> selected="selected"<?php } ?>>Live</option>                                    
                                    <option value="Completed"<?php if($games->status == 'Completed') { ?> selected="selected"<?php } ?>>Completed</option>                                    
                                    <option value="Deleted"<?php if($games->status == 'Deleted') { ?> selected="selected"<?php } ?>>Deleted</option>
                                    <option value="Disabled"<?php if($games->status == 'Disabled') { ?> selected="selected"<?php } ?>>Disabled</option>                                    
                                </select>
                                <?php echo form_error('status', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>




                        <!-- col-8 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?php echo base_url('admin/games'); ?>" class="btn btn-secondary bd-0">Cancel</a>
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
    $('.games').addClass("active");
</script>