<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pos | Dashboard</title>

    <link href="<?php bs() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bs() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php bs() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php bs() ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php bs() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php bs() ?>assets/css/style.css" rel="stylesheet">

    <script src="<?php bs() ?>assets/js/jquery-2.1.1.js"></script>

    <!-- Data Tables -->
    <link href="<?php bs() ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php bs() ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php bs() ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?php bs() ?>assets/css/bulma.css"> -->
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCO78LKT42tZE-MgQUQBP-hrOvaGgxayYs&sensor=false&libraries=places'></script>
    <script src="<?php bs() ?>assets/js/locationpicker.jquery.js"></script>

    <style>
        .success-noty
        {
            background-color: #1fb394;
            color: white;
            border: 0px; 
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php bs() ?>assets/img/admin_avatar.png" width="50"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
                                </span> 
                             </a>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php bs() ?>dashboard">
                            <i class="fa fa-th-large"></i> 
                            <span class="nav-label">Dashboards</span> 
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span class="nav-label">Jobs</span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php bs() ?>Jobs">All Jobs \ Live Jobs</a></li>
                            <li><a href="<?php bs() ?>Jobs/accepted_jobs"> Accepted Jobs</a></li>
                            <li><a href="<?php bs() ?>jobs/completed_jobs">Completed Jobs </a></li>
                        </ul>
                    </li>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">

                <li>
                    <a href="<?php bs() ?>Login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
   </div>
