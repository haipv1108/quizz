
<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Delete Category</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
			<?php 	if(isset($error)){?>
			<div style="color: red; font-weight: bold"><?php echo $error; ?></div>
			<?php } ?>
			<?php 	if(isset($success)){?>
					<div style="color: green; font-weight: bold"><?php echo $success; ?></div>
			<?php } ?>
	</div>
</div>