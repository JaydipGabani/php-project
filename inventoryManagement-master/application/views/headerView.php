<?php
/**
 * NOTE: DON'T DO ANY CHANGES
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 13:54
 */
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo base_url(); ?>application/img/favicon.jpg">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/css/style.css">

    <script src="<?php echo base_url(); ?>application/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/JsBarcode.all.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/handlebars.runtime.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/main.js"></script>
</head>
<body>
<div class="header-nav-card card hide-while-printing">
    <!--        <img src="--><?php //echo base_url();?><!--application/img/logo-animation.gif" alt="">-->
    <a href="<?php echo base_url() . 'login/logout' ?>">
        <div class="right btn-flat">LOGOUT</div>
    </a>
    <a href="<?php echo base_url() . 'changePass' ?>">
        <div class="right btn-flat">Change Password</div>
    </a>
    <div class="header-title">Inventory Management System</div>
</div>
<nav class="teal lighten-4 hide-while-printing">
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <?php if ($role == 'admin' || $role == 'worker' || $role == 'x' || $role == 'engineering') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'home' ?>">Home</a>
                </li>
            <?php } ?>
            <!--            --><?php //if ($role == 'admin') { ?>
            <!--                <li>-->
            <!--                    <a class="teal-text large-text"-->
            <!--                       href="-->
            <?php //echo base_url() . 'bufferBOMController' ?><!--">UploadBOM</a></li>-->
            <!--            --><?php //} ?>
            <!--            --><?php //if ($role == 'admin') { ?>
            <!--                <li>-->
            <!--                    <a class="teal-text large-text" href="-->
            <?php //echo base_url() . 'allBOMController' ?><!--">BOM</a></li>-->
            <!--            --><?php //} ?>
            <!---->
            <!--            --><?php //if ($role == 'admin') { ?>
            <!--                <li>-->
            <!--                    <a class="teal-text large-text" href="-->
            <?php //echo base_url() . 'bufferOrderController' ?><!--">BufferOrder</a>-->
            <!--                </li>-->
            <!--            --><?php //} ?>
            <!---->
            <!--            --><?php //if ($role == 'admin') { ?>
            <!--                <li>-->
            <!--                    <a class="teal-text large-text" href="-->
            <?php //echo base_url() . 'orderController' ?><!--">Order</a></li>-->
            <!--            --><?php //} ?>
            <!---->
            <!--            --><?php //if ($role == 'admin') { ?>
            <!--                <li>-->
            <!--                    <a class="teal-text large-text" href="-->
            <?php //echo base_url() . 'storageController' ?><!--">Report</a>-->
            <!--                </li>-->
            <!--            --><?php //} ?>

            <?php if ($role == 'admin' || $role=='x') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'manifestController' ?>">Manifest</a>
                </li>
            <?php } ?>

            <?php if ($role == 'admin') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'issueController' ?>">Issue</a></li>
            <?php } ?>

            <?php if ($role == 'admin' || $role=='x' || $role == 'engineering') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'recordController' ?>">Browse</a></li>
            <?php } ?>

            <?php if ($role == 'admin' || $role == 'worker') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'allocateLocationController' ?>">EditTag</a>
                </li>
            <?php } ?>

            <?php if ($role == 'admin'|| $role=='x' || $role == 'engineering') { ?>
                <li>
                    <a class="teal-text large-text" href="<?php echo base_url() . 'projectController' ?>">Projects</a>
                </li>
            <?php } ?>

            <?php if ($role == 'admin' || $role == 'engineering') { ?>
                <li><a class="teal-text large-text" href="<?php echo base_url() . 'adminController' ?>">Admin</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>