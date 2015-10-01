<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="http://localhost/ci/">
		<title>Control Panel| Sign In</title>
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/invalid.css" type="text/css" media="screen" />	
		<script type="text/javascript" href="template/backend/simpla-admin/resources/scripts/jquery-1.3.2.min.js"></script>

		<script type="text/javascript" href="template/backend/simpla-admin/resources/scripts/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" href="template/backend/simpla-admin/resources/scripts/facebox.js"></script>
		<script type="text/javascript" href="template/backend/simpla-admin/resources/scripts/jquery.wysiwyg.js"></script>
	</head>
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Control Panel Login</h1>
				<!-- Logo (221px width) -->
				<img id="logo" href="template/backend/simpla-admin/resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				<?php echo validation_errors(); ?>
				<form action="" method="post">
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username" value="<?php echo set_value('username'); ?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" />
					</p>
					<div class="clear"></div>
					<p>
						<div class='input-notification error png_bg'><?php if(isset($error)) echo $error;?></div>
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Sign In" />
					</p>
					<p><a href='<?php echo base_url();?>user/register'>Register</a><br/><a href='<?php echo base_url();?>user/forgot'>Forgot Password</a></p>
				</form>
			</div> <!-- End #login-content -->
		</div> <!-- End #login-wrapper -->
  </body>
  </html>