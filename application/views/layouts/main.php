<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>eStore - An Inventory System</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/boostrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main-div">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <a class="navbar-brand" href="#"><img alt="Brand" src="<?php echo base_url(); ?>assets/images/logo2.png"></a>
                    <ul class="nav navbar-nav">
<!--                        <li><a href="view.ShowStatistics.php">Statistics</a></li>
                        <li><a href="view.AddOwner.php">Owner</a></li>
                        <li><a href="view.AddVehicle.php">Vehicle</a></li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                            $display_name = $this->session->userdata('display_name');
                            $usertype = $this->session->userdata('usertype');
                            $homepage = strtolower($usertype);
                            if ( isset($display_name) && !empty($display_name) ) :
                        ?>
                        <p class="navbar-text">Logged as 
                            <a href="<?php echo base_url().$homepage; ?>">
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
    </body>
</html>