<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Delete User</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
	<?php 	if(isset($error)){?>
				<div style="color: red; font-weight: bold"><?php echo $error; die;?></div>
	<?php } ?>
	<?php 	if(isset($success)){?>
				<div style="color: green; font-weight: bold"><?php echo $success; die;?></div>
	<?php } ?>
			<form action="" method="post">
				<fieldset>
					<legend>You want to delete user <?php if(isset($user_info)) echo $user_info['name'];?>?</legend>
					<div>
						<input type="radio" name="delete" value="no" checked="checked"/>No
						<input type="radio" name="delete" value="yes" />Yes
					</div>
					<div><input type="submit" name="submit" value="Delete"/></div>
				</fieldset>
				<div class="clear"></div><!-- End .clear -->
			</form>
	</div>
</div>