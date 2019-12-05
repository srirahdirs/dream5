<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="slim-body">
     
<div class="slim-sidebar">
        <!--<label class="sidebar-label">Navigation</label>-->
        
        <ul class="nav nav-sidebar">
          
          <li class="sidebar-nav-item with-sub">
            <a href="" class="sidebar-nav-link my_profile"><i class="icon ion-ios-contact "></i> My Profile</a>
            <ul class="nav sidebar-nav-sub">
              <li class="nav-sub-item "><a href="<?= site_url('my-profile') ?>" class="nav-sub-link edit_profile">Edit Profile</a></li>
              <li class="nav-sub-item"><a href="index2.html" class="nav-sub-link">Change Password</a></li>             
              <li class="nav-sub-item"><a href="index5.html" class="nav-sub-link">KYC</a></li>
            </ul>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?= base_url() .'add-cash'?>" class="sidebar-nav-link add_cash"><i class="icon ion-cash"></i> ADD CASH</a>
          </li>
          <li class="sidebar-nav-item with-sub">
            <a href="" class="sidebar-nav-link"><i class="fa fa-money" aria-hidden="true"></i>  Withdraw </a>
            <ul class="nav sidebar-nav-sub">
              <li class="nav-sub-item"><a href="page-profile.html" class="nav-sub-link">Withdraw Cash</a></li>
              <li class="nav-sub-item"><a href="page-invoice.html" class="nav-sub-link">Withdrawal Reversal</a></li>
              <li class="nav-sub-item"><a href="page-contact.html" class="nav-sub-link">Withdrawal History</a></li>
            </ul>
          </li>
         
          <li class="sidebar-nav-item">
            <a href="widgets.html" class="sidebar-nav-link"><i class="fa fa-exchange" aria-hidden="true"></i> Transactions </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="widgets.html" class="sidebar-nav-link"><i class="fa fa-gift"></i>  My Bonus </a>
          </li>
        </ul>
      </div>