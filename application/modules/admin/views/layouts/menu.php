<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="slim-body">

<div class="slim-sidebar ps ps--theme_default">
    <!--<label class="sidebar-label">Navigation</label>-->

    <ul class="nav nav-sidebar">
        <li class="sidebar-nav-item">
            <a href="<?= site_url('admin/home') ?>" class="sidebar-nav-link active dashboard"><i class="icon ion-grid"></i> &nbsp;Dashboard</a>
        </li>

        <li class="sidebar-nav-item">
            <a href="<?= site_url('admin/users') ?>" class="sidebar-nav-link users"><i class="icon ion-ios-contact"></i> &nbsp; Users</a>
        </li>
        <li class="sidebar-nav-item with-sub">
            <a href="" class="sidebar-nav-link approvals"><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Admin Approvals </a>
            <ul class="nav sidebar-nav-sub" >
                <li class="nav-sub-item"><a href="<?= site_url('admin/approvals/manage-admin') ?>" class="nav-sub-link manage_admin">Manage Admin</a></li>
            </ul>
        </li>
        <li class="sidebar-nav-item with-sub">
            <a href="" class="sidebar-nav-link masters"><i class="fa fa-sellsy" aria-hidden="true"></i>  &nbsp; Masters </a>
            <ul class="nav sidebar-nav-sub masters_ul" style="display: block;">
                <li class="nav-sub-item"><a href="<?= site_url('admin/countries') ?>" class="nav-sub-link countries">Countries</a></li>
                <li class="nav-sub-item"><a href="<?= site_url('admin/cities') ?>" class="nav-sub-link cities">Cities</a></li>
            </ul>
        </li>



    </ul>
</div>