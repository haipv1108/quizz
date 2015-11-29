<div class="content-box">
	<div class="container">
		<div class="box">
			<div class="content-box-header box-header with-border">
				<h3 class="box-title">Edit Profile</h3>
			</div>
			
			<div class="content-box-content">
				<?php echo validation_errors();?>

				<?php 	if(isset($error)){?>
						<div style="color: red; font-weight: bold"><?php echo $error; die;?></div>
				<?php } ?>
				<?php 	if(isset($success)){?>
						<div style="color: green; font-weight: bold"><?php echo $success; die;?></div>
				<?php } ?>
				<div>
					<form action="" method="post" class="form-horizontal">
						<div class="box-body">
							<!-- Username -->
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Username :	</label>
								<div class="col-md-5">
									<p style="color: blue; padding-top: 7px;	"><b><?php echo $user_info['name']; ?></b></p>
								</div>
							</div>
							<!-- Email -->
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Email : </label>
								<div class="col-md-5">
									<input type="email" name="email" class="form-control" value="<?php echo $user_info['email']; ?>">
								</div>
							</div>
							<?php $extra_info = json_decode($user_info['extra_info'],true);?>
							<!-- Address -->
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Address : </label>
								<div class="col-md-5">
									<input class="form-control" type="text" name="address" value="<?php echo $extra_info['address']; ?>"/>
								</div>
							</div>
							<!-- Gender -->
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Gender : </label>
								<div class="col-md-2">
									<select name="gender" id="" class="form-control">
										<option value = '1' <?php if($extra_info['gender'] == 1) echo "selected='selected'";?>>Male</option>
										<option value = '0' <?php if($extra_info['gender'] == 0) echo "selected='selected'";?>>Female</option>
									</select>
								</div>
							</div>
							<!-- Birthday -->
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Birthday : </label>
								<div class="col-md-2">
									<input class="form-control" type="date" name ='birthday' value="<?php echo $extra_info['birthday']; ?>">
								</div>
							</div>
						</div> <!-- end box-body -->
						<div class="box-footer text-center">
							<div class="col-md-3 col-md-offset-4">
	                          	<button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>
	                        </div>
						</div>
					</form>
				</div> <!-- End  -->     
			</div> <!-- End .content-box-content -->

		</div>
	</div>
</div> <!-- End .content-box -->