<?php
 $baseUrl = base_url() . 'assets/admin'; 
 $baseUrlFrontend = base_url() . 'assets'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- vendor css -->
        <link href="<?= $baseUrl ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/jqvmap/css/jqvmap.min.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/toastr/toastr.min.css" rel="stylesheet">
        <!-- Slim CSS -->
        <link rel="stylesheet" href="<?= $baseUrl ?>/css_external/jquery-confirm.min.css">
        <link rel="stylesheet" href="<?= $baseUrl ?>/css/slim.css">
        <!--<link rel="stylesheet" href="<?= $baseUrl ?>/css/slim.one.css">-->
        <link rel="stylesheet" href="<?= $baseUrl ?>/css/custom.css">

    </head>
    <body class="dashboard-4">
        <div class="slim-header with-sidebar">
            <div class="container">
                <!--<div class="slim-header-left">-->
                <h2 class="slim-logo"><a href="<?= base_url() ?>admin/home"><img src="<?= $baseUrlFrontend ?>/img/logo/logo_white.png" height="95"></h2>
                <div class="slim-header-right">

                    <div class="add_chips">
<!--                        <a href="/rummy-cashier" class="addcash" title="Add Cash"><span>My CASH : </span><b> &#8377; 2300</b>  </a>-->
                    </div>
                    <div class="dropdown dropdown-a">
                        <a href="" class="header-notification" data-toggle="dropdown">
                            <i class="icon ion-ios-bolt-outline"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-header">
                                <h6 class="dropdown-menu-title">Activity Logs</h6>
                                <div>
                                    <a href="">Filter List</a>
                                    <a href="">Settings</a>
                                </div>
                            </div><!-- dropdown-menu-header -->
                            <div class="dropdown-activity-list">
                                <div class="activity-label">Today, December 13, 2017</div>
                                <div class="activity-item">
                                    <div class="row no-gutters">
                                        <div class="col-2 tx-right">10:15am</div>
                                        <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                                        <div class="col-8">Purchased christmas sale cloud storage</div>
                                    </div><!-- row -->
                                </div><!-- activity-item -->
                                <div class="activity-item">
                                    <div class="row no-gutters">
                                        <div class="col-2 tx-right">9:48am</div>
                                        <div class="col-2 tx-center"><span class="square-10 bg-danger"></span></div>
                                        <div class="col-8">Login failure</div>
                                    </div><!-- row -->
                                </div><!-- activity-item -->
                                <div class="activity-item">
                                    <div class="row no-gutters">
                                        <div class="col-2 tx-right">7:29am</div>
                                        <div class="col-2 tx-center"><span class="square-10 bg-warning"></span></div>
                                        <div class="col-8">(D:) Storage almost full</div>
                                    </div><!-- row -->
                                </div><!-- activity-item -->
                                <div class="activity-item">
                                    <div class="row no-gutters">
                                        <div class="col-2 tx-right">3:21am</div>
                                        <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                                        <div class="col-8">1 item sold <strong>Christmas bundle</strong></div>
                                    </div><!-- row -->
                                </div><!-- activity-item -->
                                <div class="activity-label">Yesterday, December 12, 2017</div>
                                <div class="activity-item">
                                    <div class="row no-gutters">
                                        <div class="col-2 tx-right">6:57am</div>
                                        <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                                        <div class="col-8">Earn new badge <strong>Elite Author</strong></div>
                                    </div><!-- row -->
                                </div><!-- activity-item -->
                            </div><!-- dropdown-activity-list -->
                            <div class="dropdown-list-footer">
                                <a href="page-activity.html"><i class="fa fa-angle-down"></i> Show All Activities</a>
                            </div>
                        </div><!-- dropdown-menu-right -->
                    </div><!-- dropdown -->
                    <div class="add_chips">
                        <a href="/rummy-cashier" class="addcash" title="Add Cash">Admin</a>
                    </div><!-- dropdown -->
                    <?php
//          print_r($this->session->userdata());
                    ?>
                    <div class="dropdown dropdown-c">
                        <a href="#" class="logged-user" data-toggle="dropdown">
                            <img src="<?= $baseUrl ?>/img/img1.jpg" alt="">
                            <span><?= $this->session->userdata('username') ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <nav class="nav">
                                <a href="page-profile.html" class="nav-link"><i class="icon ion-person"></i> View Profile</a>
                                <a href="page-edit-profile.html" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>               
                                <a href="<?= site_url('admin/logout') ?>" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
                            </nav>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </div>

            </div><!-- container -->
        </div><!-- slim-header -->
