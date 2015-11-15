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
				<label>Question Content</label>
				<textarea class="text-input textarea wysiwyg" name="question" cols="79" rows="3" ><?php echo set_value('question'); ?></textarea>
			</p>
				<div class="clear"></div>
			<p> 
				<label>Answer</label>
				<tr>
					<td>A:	<input class="text-input medium-input datepicker" type="text" name="answerA" value="<?php echo set_value('answerA');?>"/></td><br/><br/>
					<td>B:	<input class="text-input medium-input datepicker" type="text" name="answerB" value="<?php echo set_value('answerB');?>"/></td><br/><br/>
					<td>C:	<input class="text-input medium-input datepicker" type="text" name="answerC" value="<?php echo set_value('answerC');?>"/></td><br/><br/>
					<td>D:	<input class="text-input medium-input datepicker" type="text" name="answerD" value="<?php echo set_value('answerD');?>"/></td><br/><br/>
				</tr>
			</p>
			<div class="clear"></div>
			<p>
				<label>Level</label>
				<select name="level">
					<option value = '1'>Easy</option>
					<option value = '2'>Medium</option>
					<option value = '3'>Hard</option>
				</select>
			</p>
			<div class="clear"></div>

			<p>
				<label>Correct</label>
				<select name="correct">
					<option value = '1'>A</option>
					<option value = '2'>B</option>
					<option value = '3'>C</option>
					<option value = '4'>D</option>
				</select>
			</p>
			<div class="clear"></div>
			<p>
				<label>Answer Explained</label>
				<textarea class="text-input textarea wysiwyg" name="ans_explained" cols="79" rows="3" ><?php echo set_value('ans_explained'); ?></textarea>
			</p>
			<div class="clear"></div>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>