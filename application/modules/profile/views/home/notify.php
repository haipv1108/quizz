<section class="content">
	
	<?php 	if(isset($error)){?>
			<div style="color: red; font-weight: bold"><?php echo $error; ?></div>
	<?php } ?>
	<?php 	if(isset($success)){?>
			<div style="color: green; font-weight: bold"><?php echo $success; ?></div>
	<?php } ?>
</section>