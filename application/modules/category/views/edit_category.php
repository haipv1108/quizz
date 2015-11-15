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
						<label>Category Name</label>
						<input class="text-input" type="text" name="name" value="<?php echo $cate_info['name']; ?>"/>
					</p>
						<div class="clear"></div>
					<p> 
						<label>Email</label>
						<input class="text-input large-input" type="text" name="decription" value="<?php echo $cate_info['decription']; ?>"/>
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Submit" />
					</p>
				</form>
			</div>
		</div> 
</div>