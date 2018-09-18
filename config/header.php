<!DOCTYPE html>
<html>
    <head>
        <?php 
             // se root PATH
            define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/pemira/");
            //end root PATH

        //example include file from PHP    
        include(ROOT_PATH.'config/config.php'); 
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Created by KK  dev">
        <meta name="author" content="">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/template/images/favicon.ico');?>">

        <!-- App title -->
        <title> 
            Pemira | <?php if(empty($title)){echo "Title not Set";}else{echo $title;} ?>        
        </title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/template/plugins/morris/morris.css'); ?>">

        <!-- Switchery css -->
        <link href="<?= base_url('assets/template/plugins/switchery/switchery.min.css'); ?>" rel="stylesheet" />

        <!-- App CSS -->
        <link href="<?= base_url('assets/template/css/style.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- DataTable CSS -->
        <link href="<?= base_url('assets/template/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- Select2 CSS -->
        <link href="<?= base_url('assets/template/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert -->
        <link href="<?= base_url('assets/template/plugins/bootstrap-sweetalert/sweet-alert.css'); ?>" rel="stylesheet" type="text/css">
        

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- font awesome -->
        <link href="<?= base_url('assets/template/plugins/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
        
        <!-- Modernizr js -->
        <script src="<?= base_url('assets/template/js/modernizr.min.js'); ?>"></script>
        <script src="<?= base_url('assets/template/js/jquery.min.js'); ?>"></script>

        <!-- DataTables -->
        <link href="<?= base_url('assets/template/plugins/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/template/plugins/datatables/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('assets/template/plugins/datatables/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        
    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="" class="logo">
                            <i class="fa fa-check-square-o icon-c-logo"></i>
                            <span>Pemira</span>
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav pull-right">

                            <li class="nav-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            

                            


                            <li class="nav-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= base_url('assets/template/images/users/avatar-1.jpg'); ?>" alt="user" class="img-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="text-overflow"><small>Nama User</small> </h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                    </div> <!-- end menu-extras -->
                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->


            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                           <?php
                            //load menu
                            $stmt = $pemira->query("SELECT * FROM tbl_menu");
                            while ($row = $stmt->fetchObject()) {
                                if($row->url=='#'){

                                    $url = '#';
                                    $class = 'has-submenu';
                                    $stmt2 = $pemira->prepare("SELECT * FROM tbl_menu_sub where id_parent=:id");
                                    $stmt2->execute(['id' => $row->id_menu]); 
                                }else{
                                    $url = base_url($row->url);
                                    $class = '';
                                }; 
                                ?>
                            
                            <li class="<?php echo $class; ?>"> 
                                <a href="<?php echo $url; ?>"><i class="fa <?php echo $row->fa_icon; ?>"></i> <span> <?php echo $row->nama_menu; ?></span> </a>
                                <?php
                                if($class == ''){

                                }else{?>
                                    <ul class="submenu">
                                        <?php  while ($row2 = $stmt2->fetchObject()) {?>
                                        <li><a href="<?php echo base_url($row2->url); ?>"><?php echo    $row2->nama_menu_sub; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                
                            </li>
                            <?php } ?>
                            
                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->
    <div class="wrapper">
            <div class="container">