<div class="content-box">
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	
		<div class="content-box-content">
			<?php echo validation_errors();?>

			<?php 	if(isset($error)){?>
					<div style="color: red; font-weight: bold"><?php echo $error; die;?></div>
			<?php } ?>
			<?php 	if(isset($success)){?>
					<div style="color: green; font-weight: bold"><?php echo $success; die;?></div>
			<?php } ?>
			<div id="login-content">
				<form action="" method="post">
					<p>
						<label>Username : <?php echo $user_info['name']; ?></label>
					</p>
						<div class="clear"></div>
					<p> 
						<label>Email</label>
						<input class="text-input" type="text" name="email" value="<?php echo $user_info['email']; ?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" value="<?php echo $user_info['password']; ?>"/>
					</p>
					<div class="clear"></div>

					<p>
						<label>Confirm Password</label>
						<input class="text-input" type="password" name="passconf" value="<?php echo $user_info['password']; ?>"/>
					</p>
					<div class="clear"></div>
				  <?php $extra_info = json_decode($user_info['extra_info'],true);?>
					<p>
					<label>Address</label>
					<input class="text-input" type="text" name="address" value="<?php echo $extra_info['address']; ?>"/>
					</p>
					<div class="clear"></div>
					<div>
						<label>Gender</label>
						<select name="gender">
								<option value = '1' <?php if($extra_info['gender'] == 1) echo "selected='selected'";?>>Male</option>
								<option value = '0' <?php if($extra_info['gender'] == 0) echo "selected='selected'";?>>Female</option>
						</select>
					</div>
					<div class="clear"></div>
					<p>
					<div>
						<label>Birthday</label>
						<input type="date" class="" name ='birthday' value="<?php echo $extra_info['birthday']; ?>"/><br/>
					</div>
					</p>

					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Submit" />
					</p>
				</form>
			</div> <!-- End #login-content -->     
		</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->