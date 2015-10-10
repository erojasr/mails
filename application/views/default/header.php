<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo assets_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo assets_url()?>apps/metisMenu/dist/metisMenu.min.css"/>
    <link rel="stylesheet" href="<?php echo assets_url()?>apps/BootstrapFormHelpers/dist/css/bootstrap-formhelpers.min.css"/>
    <link rel="stylesheet" href="<?php echo assets_url(); ?>css/admin.css"/>

    <?php

    // load another css in the template
    /**
     * Example add the css on the controller like this
     * $css_load = array(
     *     'datimepicker' => 'datimepicker.css',
     *     'another css' => 'another.css'
     * );
     *
     */

    if(isset($css_load))
    {
        foreach ($css_load as $key => $css)
        {
            ?>
            <link rel="stylesheet" href="<?php echo assets_url().$css; ?>"/>
            <?php
        }

    }

    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    if(isset($top_js)){
        foreach ($top_js as $key => $topjs) {
            if($key == 'CDN')
            {
                ?><script src="<?php echo $topjs; ?>"></script><?php
            }
            else
            {
                ?><script src="<?php echo assets_url().$topjs; ?>"></script><?php
            }
        }

    }
    ?>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard">Emails</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-left"> <!-- header left -->
        <?php
        if($access != NULL && $access == 1){
            ?>
            <li>
                <a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>users"><i class="fa fa-gear fa-fw"></i> Add User</a>
            </li>
            <?php
        }
        ?>
        </ul>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">

                <?php
                $display_lang = '<div class="bfh-selectbox bfh-languages" data-language="es_CR" data-available="en_US,es_CR" data-flags="true" data-blank="false"></div>';
                if($lang == 'english')
                    $display_lang = '<div class="bfh-selectbox bfh-languages" data-language="en_US" data-available="es_CR,en_US" data-flags="true" data-blank="false"></div>';

                echo $display_lang;
                ?>
            </li>
            <li class="dropdown">

                <?php
                if($is_logged){
                    ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $user; ?>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login/logout_user"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                    <?php
                }
                else{
                    ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-lock fa-fw"></i>Access  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login#login"><i class="fa fa-sign-in fa-fw"></i><?php echo lang('login'); ?></a>
                        </li>
                        <li><a href="login#recovery"><i class="fa fa-unlock fa-fw"></i> <?php echo lang('forgot'); ?></a>
                        </li>
                        <li><a href="login#register"><i class="fa fa-user fa-fw"></i> <?php echo lang('register'); ?></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                    <?php
                }
                ?>
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <?php echo (empty($sidebar))?"":$sidebar; ?>
    </nav>