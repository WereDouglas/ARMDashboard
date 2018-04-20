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
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/lobipanel/lobipanel.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/vendor/lobipanel.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/jqueryui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/separate/pages/widgets.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">
    </head>
    <body class="with-side-menu control-panel control-panel-compact">

        <header class="site-header">
            <div class="container-fluid">
                <a href="#" class="site-logo">
                    <?php echo '<img class="hidden-md-down" src="data:image/jpeg;base64,' . $this->session->userdata('logo') . '" />'; ?>
                    <?php echo '<img class="hidden-lg-down" src="data:image/jpeg;base64,' . $this->session->userdata('logo') . '" />'; ?>                    
                </a>
                <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                    <span>toggle menu</span>
                </button>

                <button class="hamburger hamburger--htla">
                    <span>toggle menu</span>
                </button>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="site-header-shown">
                            <div class="dropdown dropdown-notification notif">
                                <a href="#"
                                   class="header-alarm dropdown-toggle active"
                                   id="dd-notification"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="font-icon-alarm"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
                                    <div class="dropdown-menu-notif-header">
                                        Notifications
                                        <span class="label label-pill label-danger">4</span>
                                    </div>
                                    <div class="dropdown-menu-notif-list">
                                        <div class="dropdown-menu-notif-item">
                                            <div class="photo">
                                                <img src="<?= base_url(); ?>img/photo-64-1.jpg" alt="">
                                            </div>
                                            <div class="dot"></div>
                                            <a href="#">Morgan</a> was bothering about something
                                            <div class="color-blue-grey-lighter">7 hours ago</div>
                                        </div>
                                        <div class="dropdown-menu-notif-item">
                                            <div class="photo">
                                                <img src="<?= base_url(); ?>img/photo-64-2.jpg" alt="">
                                            </div>
                                            <div class="dot"></div>
                                            <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
                                            <div class="color-blue-grey-lighter">7 hours ago</div>
                                        </div>
                                        <div class="dropdown-menu-notif-item">
                                            <div class="photo">
                                                <img src="<?= base_url(); ?>img/photo-64-3.jpg" alt="">
                                            </div>
                                            <div class="dot"></div>
                                            <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
                                            <div class="color-blue-grey-lighter">7 hours ago</div>
                                        </div>
                                        <div class="dropdown-menu-notif-item">
                                            <div class="photo">
                                                <img src="<?= base_url(); ?>img/photo-64-4.jpg" alt="">
                                            </div>
                                            <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
                                            <div class="color-blue-grey-lighter">7 hours ago</div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu-notif-more">
                                        <a href="#">See more</a>
                                    </div>
                                </div>
                            </div>


                            <div class="dropdown user-menu">
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <?php echo '<img src="data:image/jpeg;base64,' . $this->session->userdata('image') . '" />'; ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username'); ?></a>

                                    <a class="dropdown-item" href="<?php echo base_url() . "index.php/login/logout"; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </div>

                            <button type="button" class="burger-right">
                                <i class="font-icon-menu-addl"></i>
                            </button>
                        </div><!--.site-header-shown-->

                        <div class="mobile-menu-right-overlay"></div>
                        <div class="site-header-collapsed">
                            <div class="site-header-collapsed-in">

                                <div class="dropdown dropdown-typical">
                                    <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="font-icon font-icon-cogwheel"></span>
                                        <span class="lbl">Settings</span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
                                        <a class="dropdown-item" href="#">Current Search</a>
                                        <a class="dropdown-item" href="#">Search for Issues</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-header">Recent issues</div>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>


                                    </div>
                                </div>





                            </div><!--.site-header-collapsed-in-->
                        </div><!--.site-header-collapsed-->
                    </div><!--site-header-content-in-->
                </div><!--.site-header-content-->
            </div><!--.container-fluid-->
        </header><!--.site-header-->

        <div class="mobile-menu-left-overlay"></div>
        <nav class="side-menu">
            <ul class="side-menu-list">
                <li class="blue-dirty">
                    <a href="<?php echo base_url() . "index.php/home/dashboard"; ?>" target="frame">
                        <span class="glyphicon glyphicon-th"></span>
                        <span class="lbl">Dashboard</span>
                    </a>
                </li>
                <li class="aquamarine">
                    <a href="<?php echo base_url() . "index.php/calendar/"; ?>" target="frame">
                        <i class="font-icon font-icon-calend"></i>
                        <span class="lbl">Calendar</span>
                    </a>
                </li>
                  <li class="red">
                    <a href="<?php echo base_url() . "index.php/customer/"; ?>" target="frame">
                        <i class="font-icon font-icon-contacts"></i>
                        <span class="lbl">Customers</span>
                    </a>
                </li>
                <li class="magenta opened">
                   <a href="<?php echo base_url() . "index.php/vendor/"; ?>" target="frame">
                        <i class="font-icon font-icon-user"></i>
                        <span class="lbl">Vendors</span>
                    </a>
                </li>
                 <li class="grey with-sub">
                    <a href="<?php echo base_url() . "index.php/product/"; ?>" target="frame">
                        <i class="font-icon font-icon-comments active"></i>
                        <span class="lbl">Products</span>
                    </a>
                </li>
                <li class="magenta with-sub">
                    <span>
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <span class="lbl">Transactions</span>
                    </span>
                    <ul>
                        <li> <a href="<?php echo base_url() . "index.php/invoice/"; ?>" target="frame"><span class="lbl">Invoices</span></a></li>
                        <li> <a href="<?php echo base_url() . "index.php/transaction/"; ?>" target="frame"><span class="lbl">Sales/Purchases</span></a></li>
                        <li><a href="<?php echo base_url() . "index.php/payment/"; ?>" target="frame"><span class="lbl">Payments</span></a></li>
                    </ul>
                </li>
                <li class="green with-sub">
                    <span>
                        <i class="font-icon font-icon-widget"></i>
                        <span class="lbl">Supply/Delivery</span>
                    </span>
                    <ul>
                        <li><a href="<?php echo base_url() . "index.php/delivery/"; ?>" target="frame"><span class="lbl">Delivery/Pickup Ticket</span></a></li>
                        <li><a href="<?php echo base_url() . "index.php/order/"; ?>" target="frame"><span class="lbl">Order Intake</span></a></li>
                        <li><a href="<?php echo base_url() . "index.php/instruction/"; ?>" target="frame"><span class="lbl">DME Instruction Delivery</span></a></li>
                        <li><a href="<?php echo base_url() . "index.php/follow/"; ?>" target="frame"><span class="lbl">Follow up plan of care</span></a></li>                                                
                    </ul>
                </li>  
               

                <li class="grey with-sub">
                    <span>
                        <span class="glyphicon glyphicon-duplicate"></span>
                        <span class="lbl">Schedules</span>
                    </span>
                    <ul>
                        <li><a href="<?php echo base_url() . "index.php/rate/"; ?>" target="frame"><span class="lbl">Rates</span></a></li>
                        <li><a href="<?php echo base_url() . "index.php/schedule/"; ?>" target="frame"><span class="lbl">Schedules</span></a></li>                       
                    </ul>
                </li>
                <li class="blue-dirty">
                    <a href="<?php echo base_url() . "index.php/account/"; ?>" target="frame">
                        <i class="font-icon font-icon-notebook"></i>
                        <span class="lbl">Accounts</span>
                    </a>
                </li>
               
                <li class="blue">
                    <a href="<?php echo base_url() . "index.php/responsible/"; ?>" target="frame">
                        <i class="font-icon glyphicon glyphicon-paperclip"></i>
                        <span class="lbl">Patient Care</span>
                    </a>
                </li>
               
                <li class="red">
                    <a href="<?php echo base_url() . "index.php/insurance/"; ?>" target="frame">
                        <i class="font-icon font-icon-case-2"></i>
                        <span class="lbl">Insurance</span>
                    </a>
                </li>
              
              
            </ul>

          
        </nav><!--.side-menu-->

        <div class="page-content">
            <script language="javascript" type="text/javascript">
                function resizeIframe(obj) {
                    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                    // obj.style.width = obj.contentWindow.document.body.scrollHeight + 'px';
                }
            </script>
            <iframe id="frame" name="frame" frameborder="no" border="0" onload="resizeIframe(this)" scrolling="no"  style="padding: 10px; min-height:750px;" width="100%" class="span12" src="<?php echo base_url() . "index.php/home/dashboard"; ?>"> </iframe>         

        </div><!--.page-content-->

        <div class="control-panel-container">
            <ul>
                <li class="tasks">
                    <div class="control-item-header">
                        <a href="#" class="icon-toggle">
                            <span class="caret-down fa fa-caret-down"></span>
                            <span class="icon fa fa-tasks"></span>
                        </a>
                        <span class="text">Task list</span>
                        <div class="actions">
                            <a href="#">
                                <span class="fa fa-refresh"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-cog"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-trash"></span>
                            </a>
                        </div>
                    </div>
                    <div class="control-item-content">
                        <div class="control-item-content-text">You don't have pending tasks.</div>
                    </div>
                </li>
                <li class="sticky-note">
                    <div class="control-item-header">
                        <a href="#" class="icon-toggle">
                            <span class="caret-down fa fa-caret-down"></span>
                            <span class="icon fa fa-file"></span>
                        </a>
                        <span class="text">Sticky Note</span>
                        <div class="actions">
                            <a href="#">
                                <span class="fa fa-refresh"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-cog"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-trash"></span>
                            </a>
                        </div>
                    </div>
                    <div class="control-item-content">
                        <div class="control-item-content-text">
                            StartUI – a full featured, premium web application admin dashboard built with Twitter Bootstrap 4, JQuery and CSS
                        </div>
                    </div>
                </li>
                <li class="emails">
                    <div class="control-item-header">
                        <a href="#" class="icon-toggle">
                            <span class="caret-down fa fa-caret-down"></span>
                            <span class="icon fa fa-envelope"></span>
                        </a>
                        <span class="text">Recent e-mails</span>
                        <div class="actions">
                            <a href="#">
                                <span class="fa fa-refresh"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-cog"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-trash"></span>
                            </a>
                        </div>
                    </div>
                    <div class="control-item-content">
                        <section class="control-item-actions">
                            <a href="#" class="link">My e-mails</a>
                            <a href="#" class="mark">Mark visible as read</a>
                        </section>
                        <ul class="control-item-lists">
                            <li>
                                <a href="#">
                                    <h6>Welcome to the Community!</h6>
                                    <div>Hi, welcome to the my app...</div>
                                    <div>
                                        Message text
                                    </div>
                                </a>
                                <a href="#" class="reply-all">Reply all</a>
                            </li>
                            <li>
                                <a href="#">
                                    <h6>Welcome to the Community!</h6>
                                    <div>Hi, welcome to the my app...</div>
                                    <div>
                                        Message text
                                    </div>
                                </a>
                                <a href="#" class="reply-all">Reply all</a>
                            </li>
                            <li>
                                <a href="#">
                                    <h6>Welcome to the Community!</h6>
                                    <div>Hi, welcome to the my app...</div>
                                    <div>
                                        Message text
                                    </div>
                                </a>
                                <a href="#" class="reply-all">Reply all</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="add">
                    <div class="control-item-header">
                        <a href="#" class="icon-toggle no-caret">
                            <span class="icon fa fa-plus"></span>
                        </a>
                    </div>
                </li>
            </ul>
            <a class="control-panel-toggle">
                <span class="fa fa-angle-double-left"></span>
            </a>
        </div>

        <script src="<?= base_url(); ?>js/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/popper/popper.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/tether/tether.min.js"></script>
        <script src="<?= base_url(); ?>js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>js/plugins.js"></script>

        <script type="text/javascript" src="<?= base_url(); ?>js/lib/jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>js/lib/lobipanel/lobipanel.min.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
                $(document).ready(function () {
                    $('.panel').each(function () {
                        try {
                            $(this).lobiPanel({
                                sortable: true
                            }).on('dragged.lobiPanel', function (ev, lobiPanel) {
                                $('.dahsboard-column').matchHeight();
                            });
                        } catch (err) {
                        }
                    });

                    google.charts.load('current', {'packages': ['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var dataTable = new google.visualization.DataTable();
                        dataTable.addColumn('string', 'Day');
                        dataTable.addColumn('number', 'Values');
                        // A column for custom tooltip content
                        dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
                        dataTable.addRows([
                            ['MON', 130, ' '],
                            ['TUE', 130, '130'],
                            ['WED', 180, '180'],
                            ['THU', 175, '175'],
                            ['FRI', 200, '200'],
                            ['SAT', 170, '170'],
                            ['SUN', 250, '250'],
                            ['MON', 220, '220'],
                            ['TUE', 220, ' ']
                        ]);

                        var options = {
                            height: 314,
                            legend: 'none',
                            areaOpacity: 0.18,
                            axisTitlesPosition: 'out',
                            hAxis: {
                                title: '',
                                textStyle: {
                                    color: '#fff',
                                    fontName: 'Proxima Nova',
                                    fontSize: 11,
                                    bold: true,
                                    italic: false
                                },
                                textPosition: 'out'
                            },
                            vAxis: {
                                minValue: 0,
                                textPosition: 'out',
                                textStyle: {
                                    color: '#fff',
                                    fontName: 'Proxima Nova',
                                    fontSize: 11,
                                    bold: true,
                                    italic: false
                                },
                                baselineColor: '#16b4fc',
                                ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                                gridlines: {
                                    color: '#1ba0fc',
                                    count: 15
                                }
                            },
                            lineWidth: 2,
                            colors: ['#fff'],
                            curveType: 'function',
                            pointSize: 5,
                            pointShapeType: 'circle',
                            pointFillColor: '#f00',
                            backgroundColor: {
                                fill: '#008ffb',
                                strokeWidth: 0,
                            },
                            chartArea: {
                                left: 0,
                                top: 0,
                                width: '100%',
                                height: '100%'
                            },
                            fontSize: 11,
                            fontName: 'Proxima Nova',
                            tooltip: {
                                trigger: 'selection',
                                isHtml: true
                            }
                        };

                        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                        chart.draw(dataTable, options);
                    }
                    $(window).resize(function () {
                        drawChart();
                        setTimeout(function () {
                        }, 1000);
                    });
                });
        </script>
        <script src="<?= base_url(); ?>js/app.js"></script>
    </body>
</html>