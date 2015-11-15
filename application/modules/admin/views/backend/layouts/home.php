<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		<title><?php echo (isset($meta_title))? htmlspecialchars($meta_title): 'Controll Panel';?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="<?php echo site_url();?>">
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/invalid.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/facebox.js"></script>
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/jquery.date.js"></script>
	</head>
	<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
			<a href="#"><img id="logo" src="template/backend/simpla-admin/resources/images/logo.png" alt="Simpla Admin logo" /></a>
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo (isset($user))? htmlspecialchars($user['name']) : 'Member';?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
				<br />
				<a href="#" title="View the Site">View the Site</a> | <a href="<?php echo base_url();?>verify/logout" title="Sign Out">Sign Out</a>
			</div>        
			<ul id="main-nav">  <!-- Accordion Menu -->
				<li>
					<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				<li> 
					<a href="" class="nav-top-item <?php if(isset($active) && !empty($active)) echo strlen(strstr($active,'admin'))?'current':'';?>">
					User
					</a>
					<ul>
						<li><a <?php echo (isset($active) && $active=='admin-view')? 'class="current"' : '' ?> href="<?php echo site_url();?>admin">Manage User</a></li>
						<li><a <?php echo (isset($active) && $active=='admin-add')? 'class="current"' : '' ?> href="<?php echo site_url();?>admin/adduser">Write a new User</a></li>
					</ul>
				</li>
				<li>
					<a href="" class="nav-top-item <?php if(isset($active) && !empty($active)) echo strlen(strstr($active,'cate'))?'current':'';?>">
						Category
					</a>
					<ul>
						<li><a <?php echo (isset($active) && $active=='cate-view')? 'class="current"' : '' ?> href="<?php echo site_url();?>category">Manage Category</a></li>
						<li><a <?php echo (isset($active) && $active=='cate-add')? 'class="current"' : '' ?> href="<?php echo site_url();?>category/addcategory">Create a new Category</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item <?php if(isset($active) && !empty($active)) echo strlen(strstr($active,'subject'))?'current':'';?>">
						Subject
					</a>
					<ul>
						<li><a <?php echo (isset($active) && $active=='subject-view')? 'class="current"' : '' ?> href="<?php echo site_url();?>subject">Manage Subject</a></li>
						<li><a <?php echo (isset($active) && $active=='subject-add')? 'class="current"' : '' ?> href="<?php echo site_url();?>subject/addsubject">Create a new Subject</a></li>
					</ul>
				</li>
				<li>
					<a href="" class="nav-top-item <?php if(isset($active) && !empty($active)) echo strlen(strstr($active,'quiz'))?'current':'';?>">
						Question
					</a>
					<ul>
						<li><a <?php echo (isset($active) && $active=='quiz-view')? 'class="current"' : '' ?> href="<?php echo site_url();?>question">Manage Question</a></li>
						<li><a <?php echo (isset($active) && $active=='quiz-add')? 'class="current"' : '' ?> href="<?php echo site_url();?>question/addquestion">Create a new Question</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="#">General</a></li>
						<li><a href="#">Design</a></li>
						<li><a href="#">Your Profile</a></li>
						<li><a href="#">Users and Permissions</a></li>
					</ul>
				</li>      
			</ul>
		</div></div>
		<div id="main-content">
			<noscript>
				<div class="notification error png_bg">
					<div>
						Trình duyệt của bạn không hỗ trợ JavaScript./div>
				</div>
			</noscript>
			<!-- Page Head -->
			<h2>Welcome <?php echo (isset($user))? htmlspecialchars($user['name']) : 'Member';?></h2>
			<p id="page-intro">...from to <?php echo (isset($meta_title))? htmlspecialchars($meta_title):'Manage Page';?></p>
			<div class="clear"></div>
			<?php if(isset($template) && !empty($template)) $this->load->view($template, isset($data)?$data:NULL);?>
			<div class="clear"></div>
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div>
</body>
  

<!-- Download From www.exet.tk-->
</html>
