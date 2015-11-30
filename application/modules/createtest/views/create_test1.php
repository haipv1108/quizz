<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<?php echo validation_errors();?>
		<form action="" method="post">
			<p>
				<label>Tên đề thi</label>
				<input class="text-input" type="text" name="test_name" value="<?php echo set_value('test_name'); ?>"/>
				<span id="avai"></span>
			</p>
				<div class="clear"></div>
			<p> 
				<label>Thời gian</label>
				<input class="text-input" type="text" name="test_time" value="<?php echo set_value('test_time'); ?>"/>
				<span id="available"></span>
			</p>
			<div class="clear"></div>
			<p>
				<label>Mô tả</label>
				<input class="text-input" type="text" name="test_des" value="<?php echo set_value('test_des'); ?>"/>
			</p>
			<div class="clear"></div>

			<p>
				<label>Mã đề thi</label>
				<input class="text-input" type="madethi" name="madethi" value="<?php echo set_value('madethi'); ?>"/>
			</p>
			<div class="clear"></div>
			<div>
				<label>Cách chấm</label>
				<select name="type">
					<option selected value = 'non_select'>Chọn loại câu hỏi</option>
					<option value = '1' <?php if(set_value('type') == 1) echo 'selected';?>>Chỉ cần chọn một câu trả lời đúng</option>
					<option value = '2' <?php if(set_value('type') == 2) echo 'selected';?>>Điểm sẽ được chia đều cho các đáp án đúng</option>
					<option value = '3' <?php if(set_value('type') == 3) echo 'selected';?>>Phải trả lời hết các đáp án đúng</option>
				</select>
			</div>
			<div class="clear"></div>
			<p>
			<div>
				<label>Môn học</label>
				<select id = "category" name = "category">
					<option selected value = 'non_select'>Select Category</option>
					<?php
					foreach($categories as $key => $value) {
						?>
							<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
							<?php
					 } ?>
				</select>
			</div>
			</p>
			<div class="clear"></div>
			<div>
				<label>Độ khó</label>
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
			</div>
			<div class="clear"></div>
			<p>
				<label>Tổng số lượng câu hỏi</label>
				<input type = text id = max_question name = max_question value="<?php echo set_value('max_question'); ?>">
				<span id="avai"></span>
			</p>
			<div class="clear"></div>
			<p>
			<div>
				<label>Phần học</label>
				<select id = "subject">
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
			</div>
			</p>
			<div class="clear"></div>
			
			<p>
				<label>Số lượng câu hỏi</label>
				<input type = text id = "num_question" value="<?php echo set_value('num_question'); ?>">
				<span id="avai"></span>
			</p>
			<div class="clear"></div>
			<p>
				<label>Điểm cho phần này</label>
				<input type = text id = "score_question" value="<?php echo set_value('score_question'); ?>">
				<span id="avai"></span>
			</p>
			<div class="clear"></div>
			
			<p>
				<input class="button" type = button id = "btn_add" name = "btn_add" value="Add" />
			</p>
			
			
			<div>
				<label>Level</label>
				<select name="level">
						<option value = '1'>Student</option>
						<option value = '2'>Teacher</option>
						<option value = '3'>Admin</option>
				</select>
			</div>
			<div class="clear"></div>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>