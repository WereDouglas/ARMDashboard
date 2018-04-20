<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ARM</title>

        <link href="<?= base_url(); ?>img/doctor-icon" rel="apple-touch-icon" type="image/png" sizes="144x144">
        <link href="<?= base_url(); ?>img/doctor-icon.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
        <link href="<?= base_url(); ?>img/doctor-icon.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
        <link href="<?= base_url(); ?>img/doctor-icon.png" rel="apple-touch-icon" type="image/png">
        <link href="<?= base_url(); ?>img/doctor-icon.png" rel="icon" type="image/png">
        <link href="<?= base_url(); ?>img/favicon.ico" rel="shortcut icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/pages/login.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">
    </head>
    <body>

        <div class="page-center">
            <div class="page-center-in">
                <div class="container-fluid">
                    <form id="station-form" class="sign-box" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/login/sign'  method="post">
                        <div class="sign-avatar">
                            <img src="<?= base_url(); ?>img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title">Sign In</header>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="contact" placeholder="Contact"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <div class="checkbox float-left">
                                <input type="checkbox" id="signed-in"/>
                                <label for="signed-in">Keep me signed in</label>
                            </div>
                            <div class="float-right reset">
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded">Sign in</button>
                       
                       
                    </form>
                </div>
            </div>
        </div><!--.page-center-->


        <script src="<?= base_url(); ?>js/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/popper/popper.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/tether/tether.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/plugins.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script>
            $(function () {
                $('.page-center').matchHeight({
                    target: $('html')
                });

                $(window).resize(function () {
                    setTimeout(function () {
                        $('.page-center').matchHeight({remove: true});
                        $('.page-center').matchHeight({
                            target: $('html')
                        });
                    }, 100);
                });
            });
        </script>
        <script src="<?= base_url(); ?>js/app.js"></script>
    </body>
</html>