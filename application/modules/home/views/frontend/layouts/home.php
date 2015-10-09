<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<base href="<?php echo site_url();?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (isset($meta_title))? htmlspecialchars($meta_title): 'Online Examination System';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="template/frontend/Online Examination System/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/documentation/style.css" type="text/css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/web/style.css" type="text/css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="index2.html" class="logo">
          <span class="logo-mini"><b>OES</b></span>
          <span class="logo-lg"><b>OES</b>.com</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="template/frontend/Online Examination System/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="template/frontend/Online Examination System/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="template/frontend/Online Examination System/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="template/frontend/Online Examination System/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="template/frontend/Online Examination System/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-light-blue"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="template/frontend/Online Examination System/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Zoro Kid</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="template/frontend/Online Examination System/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Zoro Kid - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-success btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-warning btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="template/frontend/Online Examination System/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Zoro Kid</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Tiếng Nhật</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Ngữ pháp 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Sơ cấp
                        <small class="label pull-right bg-yellow">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Trung cấp
                        <small class="label pull-right bg-primary">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Cao cấp
                        <small class="label pull-right bg-green">12</small>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Từ vựng 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Sơ cấp
                        <small class="label pull-right bg-yellow">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Trung cấp
                        <small class="label pull-right bg-primary">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Cao cấp
                        <small class="label pull-right bg-green">12</small>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Hán tự 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Sơ cấp
                        <small class="label pull-right bg-yellow">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Trung cấp
                        <small class="label pull-right bg-primary">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Cao cấp
                        <small class="label pull-right bg-green">12</small>
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Tiếng Anh</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Ngữ pháp 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Sơ cấp
                        <small class="label pull-right bg-yellow">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Trung cấp
                        <small class="label pull-right bg-primary">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Cao cấp
                        <small class="label pull-right bg-green">12</small>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Từ vựng
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Sơ cấp
                        <small class="label pull-right bg-yellow">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Trung cấp
                        <small class="label pull-right bg-primary">12</small>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-circle-o"></i> Cao cấp
                        <small class="label pull-right bg-green">12</small>
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </li>
            <li>
              <a href="mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Somethings</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
		<a href = "<?php echo site_url();?>">
          <h1>
            OnlineExaminationSystem
            <small>.com</small>
          </h1>
		</a>
          <ol class="breadcrumb">
            <li class="active">
              <i class="fa fa-dashboard"></i>Home
            </li>
          </ol>
        </section> <!-- Content Header -->
		<?php if(isset($template) && !empty($template)) $this->load->view($template, isset($data)?$data:NULL);?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
        <div class="tab-content">
          <div class="tab-pane" id="control-sidebar-home-tab"></div><!-- /.tab-pane -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->

          
        </div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>
    <script src="template/frontend/Online Examination System/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="template/frontend/Online Examination System/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/fastclick/fastclick.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/app.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/demo.js"></script>
  </body>
</html>
