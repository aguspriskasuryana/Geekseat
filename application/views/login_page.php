<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SOC </title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url('asset'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('asset'); ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('asset'); ?>/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url('asset'); ?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('asset'); ?>/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body style="background:#F7F7F7;">
    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="<?php echo site_url('auth/login')?>" method="post">
                        <h1>Login</h1>
                        
                        <?php
                            if($this->session->flashdata('alerts')) {
                                foreach($this->session->flashdata('alerts') as $key => $alert) {
                                    if($alert[0] == 'success') echo $alert[1];

                                    else if($alert[0] == 'error') echo $alert[1];

                                    else if($alert[0] == 'warning') echo $alert[1];

                                    else echo $alert[1];
                                }
                            }
                            ?>
                    
                        <div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="pwd" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                        	<input name="login" class="btn btn-default submit" type="submit" value="Login">
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-key"  style="font-size: 26px;"></i> Geek Seat</h1>

                                <p>©2023</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>


</body>

</html>