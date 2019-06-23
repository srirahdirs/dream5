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
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-ios-home-outline"></i>
                    <span>Home</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-ios-game-controller-b"></i>
                    <span>PLAY GAME</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-cash"></i>
                    <span>BUY CASH</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-waterdrop"></i>
                    <span>WITHDRAW</span>
                </a>            
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('home') ?>">
                    <i class="icon ion-trophy"></i>
                    <span>WINNERS</span>
                </a>            
            </li>

            <li class="nav-item">
                <a class="nav-link" href="page-messages.html">
                    <i class="icon ion-ios-chatboxes-outline"></i>
                    <span>SUPPORT</span>
                    <span class="square-8"></span>
                </a>
            </li>
            
        </ul>
    </div><!-- container -->
</div><!-- slim-navbar -->