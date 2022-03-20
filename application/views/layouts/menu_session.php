<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$encrypted_user_id = encryptId($this->session->userdata('user_id'));
?>
<div class="slim-body">

    <div class="slim-sidebar">
        <label class="sidebar-label">Navigation <i class="icon ion-navicon-round frion"></i></label>

        <ul class="nav nav-sidebar">
            <li class="sidebar-nav-item">
                <a href="<?= base_url() . 'payments/game'?>" class="sidebar-nav-link play_game"><i class="fa fa-gamepad" aria-hidden="true"></i> Play Game </a>
            </li>
            <li class="sidebar-nav-item with-sub">
                <a href="" class="sidebar-nav-link my_profile"><i class="icon ion-ios-contact "></i> My Profile</a>
                <ul class="nav sidebar-nav-sub">
                    <li class="nav-sub-item "><a href="<?= site_url('my-profile/' . $encrypted_user_id) ?>" class="nav-sub-link edit_profile">Edit Profile</a></li>
                    <li class="nav-sub-item"><a href="<?= site_url('change-password/' . $encrypted_user_id) ?>" class="nav-sub-link change_password">Change Password</a></li>             
                    <li class="nav-sub-item"><a href="<?= site_url('user/kyc') ?>" class="nav-sub-link kyc">KYC</a></li>
                </ul>
            </li>
            <li class="sidebar-nav-item">
                <a href="<?= base_url() . 'add-cash' ?>" class="sidebar-nav-link add_cash"><i class="icon ion-cash"></i> ADD CASH</a>
            </li>
            <li class="sidebar-nav-item with-sub">
                <a href="" class="sidebar-nav-link withdraw_cash_side_menu"><i class="fa fa-money" aria-hidden="true"></i>  Withdraw </a>
                <ul class="nav sidebar-nav-sub">
                    <li class="nav-sub-item"><a href="<?= base_url() . 'withdraw-cash' ?>" class="nav-sub-link withdraw_cash">Withdraw Cash</a></li>
                    <li class="nav-sub-item"><a href="<?= base_url() . 'withdraw-reversal' ?>" class="nav-sub-link withdraw_reversal">Withdrawal Reversal</a></li>
                    <li class="nav-sub-item"><a href="<?= base_url() . 'payments/withdrawHistory'?>" class="nav-sub-link withdraw_history">Withdrawal History</a></li>
                </ul>
            </li>

            <li class="sidebar-nav-item">
                <a href="<?= base_url() . 'payments/transactions'?>" class="sidebar-nav-link transactions"><i class="fa fa-exchange" aria-hidden="true"></i> Transactions </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link"><i class="fa fa-gift"></i>  My Bonus </a>
            </li>
        </ul>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            $(window).resize(function(e) {
                $('.nav-sidebar').show();
                if ($(window).width() <= 768) {
                    $('.nav-sidebar').hide();
                    /*$('.sidebar-label').click(function () {
                      $('.nav-sidebar').slideToggle("slow");
                    });*/
                }
            });
            if ($(window).width() <= 768) {
                    $('.nav-sidebar').hide();
                    $('.sidebar-label').click(function () {
                      $('.nav-sidebar').slideToggle("slow");
                    });
                }
        });
    </script>