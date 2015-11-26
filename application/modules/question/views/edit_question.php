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
						<label>Question Content</label>
						<textarea class="text-input textarea wysiwyg" name="question" cols="79" rows="3" ><?php echo $quiz_info['question']; ?></textarea>
					</p>
						<div class="clear"></div>
					<p> 
						<label>Answer</label>
						<tr>
							<td>A:	<input class="text-input medium-input datepicker" type="text" name="answerA" value="<?php echo $quiz_info['answer'];?>"/></td><br/><br/>
							<td>B:	<input class="text-input medium-input datepicker" type="text" name="answerB" value="<?php echo $quiz_info['answer'];?>"/></td><br/><br/>
							<td>C:	<input class="text-input medium-input datepicker" type="text" name="answerC" value="<?php echo $quiz_info['answer'];?>"/></td><br/><br/>
							<td>D:	<input class="text-input medium-input datepicker" type="text" name="answerD" value="<?php echo $quiz_info['answer'];?>"/></td><br/><br/>
						</tr>
					</p>
					<div class="clear"></div>
					<p>
						<label>Level</label>
						<select name="level">
							<option value = '1' <?php if($quiz_info['level'] == 1) echo "selected='selected'";?>>Easy</option>
							<option value = '2' <?php if($quiz_info['level'] == 2) echo "selected='selected'";?>>Medium</option>
							<option value = '3' <?php if($quiz_info['level'] == 3) echo "selected='selected'";?>>Hard</option>
						</select>
					</p>
					<div class="clear"></div>

					<p>
						<label>Correct</label>
						<select name="correct">
							<option value = '1' <?php if($quiz_info['correct'] == 1) echo "selected='selected'";?>>A</option>
							<option value = '2' <?php if($quiz_info['correct'] == 1) echo "selected='selected'";?>>B</option>
							<option value = '3' <?php if($quiz_info['correct'] == 1) echo "selected='selected'";?>>C</option>
							<option value = '4' <?php if($quiz_info['correct'] == 1) echo "selected='selected'";?>>D</option>
						</select>
					</p>
					<div class="clear"></div>
					<p>
						<label>Answer Explained</label>
						<textarea class="text-input textarea wysiwyg" name="ans_explained" cols="79" rows="3" ><?php echo $quiz_info['ans_explained'];?></textarea>
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Submit" />
					</p>
				</form>
			</div>
		</div> 
</div>