<div>
	<form method="post" action="">
		<div>
			<?php if(isset($message)) echo $message;?>
		</div>

		<label>Nhập mã đề thi</label>
		<input class="text-input" type="text" name="made">
		<input type="submit" name="submitC" value="Search">
	</form>
</div>
