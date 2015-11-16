<form method="post" action="">
	<?php echo validation_errors();?>
	<?php if(isset($message)) echo $message;?>
	<div>
		Get test name<br/>
		<input class="text-input" type="text" name="choose"/>
		<input type="submit" name="submit_choosetest" value="submit">
	</div>
</form>