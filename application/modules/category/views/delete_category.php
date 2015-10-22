<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Delete User</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
			<?php echo validation_errors();?>
			<form action="" method="post">
				<fieldset>
					<legend>You want to delete category <?php if(isset($cate_info)) echo $cate_info['name'];?>?</legend>
					<div>
						<input type="radio" name="delete" value="no" checked="checked"/>No
						<input type="radio" name="delete" value="yes" />Yes
					</div>
					<div><input type="submit" name="submit" value="Delete"/></div>
				</fieldset>
				<div class="clear"></div>
			</form>
	</div>
</div>