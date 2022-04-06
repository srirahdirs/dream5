<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="slim-navbar">
    <div class="container">
        <div class="alert alert-danger login_form_err" style="display:none"></div>
        <ul class="nav">
            <li class="nav-item home_main_menu">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-home"></i>
                    <span>Home</span>
                </a>            
            </li>
            <li class="nav-item play_game_main_menu">
                <?php if ($this->session->userdata('login_status')) { 
                    $class_name = '';
                    $href_play_game = site_url('payments/game');
                    $href_add_cash = site_url('add-cash');
                    $href_withdraw = site_url('withdraw-cash');                    
                    $href_support = site_url('contact-us');
                } else {
                    $class_name = 'login_required';
                    $href_play_game = 'javascript:void(0)';
                    $href_add_cash = 'javascript:void(0)';
                    $href_withdraw = 'javascript:void(0)';
                    $href_support = site_url('contact-us');
                }
                ?>
                
                <a class="nav-link  <?= $class_name ?>" href="<?= $href_play_game ?>">
                    <i class="icon ion-ios-game-controller-b"></i>
                    <span>PLAY GAME</span>
                </a>    
                
            </li>
            <li class="nav-item add_cash_main_menu">
                <a class="nav-link add_cash <?= $class_name ?>" href="<?= $href_add_cash ?>">
                    <i class="icon ion-cash"></i>
                    <span>ADD CASH</span>
                </a>            
            </li>
            <li class="nav-item withdraw_main_menu">
                <a class="nav-link withdraw <?= $class_name ?>" href="<?= $href_withdraw ?>">
                    <i class="icon ion-briefcase"></i>
                    <span>WITHDRAW</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link winners" href="<?= site_url('home') ?>">
                    <i class="icon ion-trophy"></i>
                    <span>WINNERS</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link support <?= $class_name ?>" href="<?= $href_support ?>">
                    <i class="icon ion-chatboxes"></i>
                    <span>SUPPORT</span>
                    <span class="square-8"></span>
                </a>
            </li>

        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->
<script src="<?= base_url() .'assets/lib/jquery/js/jquery.js'?>"></script>
<script>
    
</script>