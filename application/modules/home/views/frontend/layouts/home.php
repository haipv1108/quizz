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
        <a href="" class="logo">
          <span class="logo-lg"><b>QUIZZ</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
		  <?php $user_info = $this->session->userdata('user'); 
				if(!empty($user_info)){?>
					<div class="pull-left image">
					  <img src="template/frontend/Online Examination System/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<?php 	$user_info = $this->session->userdata('user');
								if($user_info['logged_in']) echo ucwords($user_info['name']);
						?>
						<br/><br/>
						<a href="verify/logout">Logout</a>
					</div>
		<?php	}else{?>
					<h3><div style="color:red;"><a href="verify/login">Login</a></div></h3>
		<?php }?>
          </div>
          <!-- search form -->
          <form action="home/search" method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Tên & mã đề..."/>
              <span class="input-group-btn">
				<input type="submit" name="submit" id="search-btn" class="btn btn-flat" value="Tìm kiếm" />
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
			<a href = 'admin'><b>Control Panel</b></a>
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="">Tứ Đại Cường Nhân</a>.</strong> All rights reserved.
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
