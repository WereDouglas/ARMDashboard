<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="index.html">Schedules</a></li>
                            <li><a href="index.html">Organisation</a></li>
                            <li><a href="index2.html">Add user</a></li>
                            <li><a href="index3.html">View</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i>Clients<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">New</a></li>
                            <li><a href="form_advanced.html">View</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i>Files<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">New</a></li>
                            <li><a href="media_gallery.html">View</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i>Tasks <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Add</a></li>
                            <li><a href="tables_dynamic.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i>Transactions <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Income</a></li>
                            <li><a href="chartjs2.html">Expenses</a></li>
                            <li><a href="morisjs.html">Items</a></li>
                            <li><a href="echarts.html">Payments</a></li>
                            <li><a href="other_charts.html"></a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i> Documents<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Settings</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Messages </a></li>
                    <li><a><i class="fa fa-windows"></i> Extras </a></li>
                        
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" href="<?= base_url(); ?>index.php/home/logout" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
