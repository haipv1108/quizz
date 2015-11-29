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
			</span>Chọn môn học:</span>
			<select id = "category" name = "category">
				<option selected value = 'non_select'>Select Category</option>
				<?php
				if (isset($categories))
				foreach($categories as $key => $value) {
					?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
						<?php
				 } ?>
			</select>
			<br>
			<span>Chọn phần học: </span>
			<select id = "subject" name = "subject">
				<option selected value = 'non_select'>Select Subject</option>
				<?php
				if (isset($subjects)) {
					foreach($subjects as $key => $value) {
						$id = $value['id'];
						$name = $value['name'];
						print "<option value=\"$id\">$name</option>\n";
					}
				}
				?>
			</select>
			<br>
			<span>Chọn độ khó:   </span>
			<select id = "level" name = "level">
				<option selected value = 'non_select'>Select Level</option>
				<?php
				if (isset($levels)) {
					foreach($levels as $key => $value) {
						$id = $value['id'];
						$name = $value['name'];
						print "<option value = \"$id\">$name</option>";
					}
				}
				?>
			</select>
			<br>			
			<p>
				<label>Nội dung câu hỏi: </label>
				<textarea class="text-input textarea wysiwyg" name="question" cols="79" rows="3" ><?php echo set_value('question'); ?></textarea>
			</p>
			<p> 
				<label>Các câu trả lời: </label>

				<input type = 'button' id = 'btn_add' value = 'ADD' >
				<br/><br/>
				
				<ol id = answer>
				
				</ol>
				<div id = 'answer_view'>

				</div>
			</p>
			<div class="clear"></div>

			<p>
				<label>Loại câu hỏi:</label>
				<select name="type">
					<option selected value = 'non_select'>Chọn loại câu hỏi</option>
					<option value = '1' <?php if(set_value('type') == 1) echo 'selected';?>>Chỉ cần chọn một câu trả lời đúng</option>
					<option value = '2' <?php if(set_value('type') == 2) echo 'selected';?>>Điểm sẽ được chia đều cho các đáp án đúng</option>
					<option value = '3' <?php if(set_value('type') == 3) echo 'selected';?>>Phải trả lời hết các đáp án đúng</option>
				</select>
			</p>
			<div class="clear"></div>
			<p>
				<label>Hướng dẫn trả lời</label>
				<textarea class="text-input textarea wysiwyg" name="ans_explained" cols="79" rows="3" ><?php echo set_value('ans_explained'); ?></textarea>
			</p>
			<div class="clear"></div>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>

<script language="javascript" src="/CI/js/jquery-2.0.0.min.js"></script>


<script>
	var currentIndex = 0;

	$(document).ready(function(){
		//document.getElementById("btn_add").addEventListener('click',addAnswer);
		$('#btn_add').click(function(){
			index = currentIndex;
			++currentIndex;
			$('#answer').append("Đáp án " + currentIndex + ": <input type = text name = answer[]>" + "<input type = checkbox name = correct[] value = " + index +"><br/><br/>");
		});
		
		$('#category').on('change', function(){
                var selected = $('#category').val()
                $.ajax({
                    url: "<?php site_url();?>question/get_subject",
                    type: 'POST',
                    data: {cat_id : selected},
                    dataType: 'html',
                    success: function(response) {
                        $('#subject').html(response);
                    }
                });
            });


		$('#category').on('change', function(){
			var selected = $('#category').val()
			$.ajax({
				url: "<?php site_url();?>question/get_level",
				type: 'POST',
				data: {cat_id : selected},
				dataType: 'html',
				success: function(response) {
					$('#level').html(response);
				}
			});
		});
	})

</script>
