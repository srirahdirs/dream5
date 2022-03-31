<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container pd-t-50">
    <div class="card card-dash-one mg-t-20">
        <div class="row no-gutters">
            <div class="col-lg-3">
                <i class="icon ion-ios-analytics-outline"></i>
                <div class="dash-content">
                    <label class="tx-primary">Total Users</label>
                    <h2><?= 1000 + $total_user ?></h2>
                </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
                <i class="icon ion-ios-pie-outline"></i>
                <div class="dash-content">
                    <label class="tx-success">Daily Visits</label>
                    <h2><?= 77 + $total_user ?></h2>
                </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
                <i class="icon ion-ios-stopwatch-outline"></i>
                <div class="dash-content">
                    <label class="tx-purple">ONLINE Users</label>
                    <h2>-</h2>
                </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
                <i class="icon ion-ios-world-outline"></i>
                <div class="dash-content">
                    <label class="tx-danger">Likes</label>
                    <h2>-</h2>
                </div><!-- dash-content -->
            </div><!-- col-3 -->
        </div><!-- row -->
    </div>
</div>