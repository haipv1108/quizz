<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<?php echo validation_errors();?>
		<form action="" method="post">
			<span>Chọn môn học:</span>
			<select id = "category" name = "category">
				<option selected value = 'non_select'>Select Category</option>
				<?php
				if (isset($category))
				foreach($category as $key => $value) {
					?>
						<option value="<?php echo $value['id']; ?>" <?php if($quiz_info['categoryid'] == $value['id']) echo 'selected';?>><?php echo $value['name']; ?></option>
						<?php
				} ?>
			</select>
			<br>
			<span>Chọn phần học: </span>
			<select id = "subject" name = "subject">
				<option selected value = 'non_select'>Select Subject</option>
				<?php
				if (isset($subject))
				foreach($subject as $key => $value) {
					?>
						<option value="<?php echo $value['id']; ?>" <?php if($quiz_info['subjectid'] == $value['id']) echo 'selected';?>><?php echo $value['name']; ?></option>
						<?php
				 } ?>
			</select>
			<br>
			<span>Chọn độ khó:   </span>
			<select id = "level" name = "level">
				<option selected value = 'non_select'>Select Level</option>
				<?php
				if (isset($level))
				foreach($level as $key => $value) {
					?>
						<option value="<?php echo $value['id']; ?>" <?php if($quiz_info['level'] == $value['id']) echo 'selected';?>><?php echo $value['name']; ?></option>
						<?php
				 } ?>
			</select>
			<br>			
			<p>
				<label>Nội dung câu hỏi: </label>
				<textarea class="text-input textarea wysiwyg" name="question" cols="79" rows="3" ><?php echo $quiz_info['question'];?></textarea>
			</p>
			<p> 
				<label>Các câu trả lời: </label>

				<input type = 'button' class="button" id = 'btn_add' value = 'ADD' >
				<br/><br/>
				
				<ol id = answer>
					<?php 	$ans = json_decode($quiz_info['answer'], true);
							$cor = json_decode($quiz_info['correct'], true);
							$i = 0;
							foreach($ans as $key=>$val){?>
								Đáp án <?php echo $key;?> : <input type='text' class = 'text-input' name = 'answer[]' value='<?php echo $val;?>'>
					<?php		for($k = 1; $k <= sizeof($cor); ++$k){
									if($key == $cor[$k]) break;
								}
								if ($k <= sizeof($cor)) {?>
									<input type = checkbox name = 'correct[]' checked value = <?php echo $key;?> >
					<?php		} else {?>
									<input type = checkbox name = correct[] value = <?php echo $key;?> >
					<?php		}?>
								<br></br>
								<div class="clear"></div>
					<?php	}?>
					
							
				</ol>
				<div id = 'answer_view'>

				</div>
			</p>
			<div class="clear"></div>

			<p>
				<label>Loại câu hỏi:</label>
				<select name="type">
					<option selected value = 'non_select'>Chọn loại câu hỏi</option>
					<option value = '1' <?php if($quiz_info['type'] == 1) echo 'selected';?>>Chỉ cần chọn một câu trả lời đúng</option>
					<option value = '2' <?php if($quiz_info['type'] == 2) echo 'selected';?>>Điểm sẽ được chia đều cho các đáp án đúng</option>
					<option value = '3' <?php if($quiz_info['type'] == 3) echo 'selected';?>>Phải trả lời hết các đáp án đúng</option>
				</select>
			</p>
			<div class="clear"></div>
			<p>
				<label>Hướng dẫn trả lời</label>
				<textarea class="text-input textarea wysiwyg" name="ans_explained" cols="79" rows="3" ><?php echo $quiz_info['ans_explained']; ?></textarea>
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
