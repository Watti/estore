<?php

function hasPermission($url) {
    if (!$_SESSION || !isset($_SESSION['permission'])) {
        return FALSE;
    }
    $perm = $_SESSION['permission'];
    if ($perm) {
        $permission = explode(",", $perm);
        if (in_array($url, $permission)) {
            return TRUE;
        }
    }
    return FALSE;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>EStore - An Inventory System</title>
        <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    </head>
    <body>
        <div id="main-div">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img alt="Brand" src="<?php echo base_url(); ?>assets/images/logo2.png"></a>
                    <ul class="nav navbar-nav">
                        <?php if (hasPermission("stock")) : ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Stock <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>stock">Manage Stock Items</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (hasPermission("item")) : ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>item">Manage Items</a></li>
                                    <li><a href="<?php echo base_url(); ?>itemcategory">Manage Item Categories</a></li>
                                    <li><a href="<?php echo base_url(); ?>itemprice">Manage Item Prices</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (hasPermission("bill")) : ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Billing <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>bill/add">Add Bill</a></li>
                                    <li><a href="<?php echo base_url(); ?>bill">Current Bills</a></li>
                                </ul>
                            </li>                            
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>">Orders</a></li>
                        <li><a href="<?php echo base_url(); ?>">Reports</a></li>
                        <li><a href="<?php echo base_url(); ?>">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        $display_name = $this->session->userdata('display_name');
                        $usertype = $this->session->userdata('usertype');
                        $homepage = strtolower($usertype);
                        if (isset($display_name) && !empty($display_name)) :
                            ?>
                            <p class="navbar-text">Logged as 
                                <a href="<?php echo base_url() . $homepage; ?>">
                                    <span class="display-name"><?php echo $display_name; ?></span>
                                </a>
                            </p>
                            <li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
                        <?php else : ?>
                            <li><a href="<?php echo base_url(); ?>user/login">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div id="content-div">
                <div class="container-fluid">
                    <div class="row">
                        <?php $this->load->view($main_content); ?>
                    </div>
                </div>

            </div>
            <footer>
                <hr/>
                <p class="text-center">
                    <small>&COPY; Copyright 2015</small>
                </p>
            </footer>
        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
    </body>
</html>