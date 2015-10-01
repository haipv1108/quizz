<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="http://localhost/ci3/">
		<title>Register</title>
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
				
				<div>
					<div>
						<?php echo validation_errors(); ?>
						<?php if(isset($message)) echo $message;?>
					</div>
				</div>
				<form action="" method="post">
				
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username" value="<?php echo set_value('username'); ?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Email</label>
						<input class="text-input" type="text" name="email" value="<?php echo set_value('email'); ?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Confirm Password</label>
						<input class="text-input" type="password" name="passconf" />
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Register" />
					</p>
				</form>
			</div> <!-- End #login-content -->
		</div> <!-- End #login-wrapper -->
  </body>
  </html>
