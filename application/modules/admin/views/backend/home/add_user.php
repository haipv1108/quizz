<script>
	$(document).ready(function(){
		$("#username").change(function(){
			var username = $(this).val();
			$.ajax({
				url: "<?php site_url()?>admin/ajax/check_user_availablity",
				dataType: 'html',
				type: 'POST',
				data: {
					username: username,
				},
				success: function(result){
					if(result == 'true' ){
						$('#avai').html('<span class="notification error png_bg">Username is NOT available.</span>');
					}else if(result == 'false'){
						$('#avai').html('<span class="notification success png_bg">Username is available.</span>');
					}
				}
			});
		});
	});
	$(document).ready(function(){
		$("#email").change(function(){
			var email = $(this).val();
			$.ajax({
				type: 'POST',
				url: "<?php site_url();?>admin/ajax/check_email_availablity",
				dataType: 'html',
				data: {
					email : email,
				},
				success: function(response){
					if(response == 'true'){
						$('#available').html('<span class="notification error png_bg">Email is NOT available.</span>');
					}else if(response == 'false'){
						$('#available').html('<span class="notification success png_bg">Email is available.</span>');
					}
				}
			});
		});
	});
</script>
<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<?php echo validation_errors();?>
		<?php 	if(isset($error)){?>
					<div style="color: red; font-weight: bold"><?php echo $error;?></div>
			<?php } ?>
			<?php 	if(isset($success)){?>
					<div style="color: green; font-weight: bold"><?php echo $success; die;?></div>
			<?php } ?>
		<form action="" method="post">
			<p>
				<label>Username</label>
				<input id="username" class="text-input" type="text" name="username" value="<?php echo set_value('username'); ?>"/>
				<span id="avai"></span>
			</p>
				<div class="clear"></div>
			<p> 
				<label>Email</label>
				<input id = "email" class="text-input" type="text" name="email" value="<?php echo set_value('email'); ?>"/>
				<span id="available"></span>
			</p>
			<div class="clear"></div>
			<p>
				<label>Password</label>
				<input class="text-input" type="password" name="password" value="<?php echo set_value('password'); ?>"/>
			</p>
			<div class="clear"></div>

			<p>
				<label>Confirm Password</label>
				<input class="text-input" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>"/>
			</p>
			<div class="clear"></div>
			<p>
				<label>Address</label>
				<input class="text-input" type="text" name="address" value="<?php echo set_value('address'); ?>"/>
			</p>
			<div class="clear"></div>
			<div>
				<label>Gender</label>
				<select name="gender">
						<option value = '1'>Male</option>
						<option value = '0'>Female</option>
				</select>
			</div>
			<p>
			<div>
				<label>Birthday</label>
				<input type="date" class="" name ='birthday' value="<?php echo set_value('birthday'); ?>"/><br/>
			</div>
			</p>
			<div>
				<label>Level</label>
				<select name="level">
						<option value = '1'>Student</option>
						<option value = '2'>Teacher</option>
						<option value = '3'>Admin</option>
				</select>
			</div>
			<div class="clear"></div>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>