<?php $baseUrl = base_url() . 'assets'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- vendor css -->
        <link href="<?= $baseUrl ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/jquery-toggles/css/toggles-full.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/spectrum/css/spectrum.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/jqvmap/css/jqvmap.min.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
        <link href="<?= $baseUrl ?>/css_external/jquery-confirm.min.css" rel="stylesheet">
        
        <link href="<?= $baseUrl ?>/lib/toastr/toastr.min.css" rel="stylesheet">

        <!-- Slim CSS -->
        <link rel="stylesheet" href="<?= $baseUrl ?>/css/slim.css">
        <link rel="stylesheet" href="<?= $baseUrl ?>/css/slim.one.css">
        <link rel="stylesheet" href="<?= $baseUrl ?>/css/custom.css?<?= time();?>">
        <link rel="yzt" type="image/x-icon" href="<?= $baseUrl ?>/img/fav_icon.jpg" />

    </head>
    <body class="dashboard-4">
        <div class="slim-header">
            <div class="container" >
                <!--<div class="slim-header-left">-->
                <h2 class="slim-logo"><a href="<?= base_url() ?>home"><img src="<?= $baseUrl ?>/img/logo/logo_dark.png" height="95"></a></h2>
                        <?php
                        $this->load->view('users/login');
                        ?>

            </div><!-- container -->
        </div><!-- slim-header -->