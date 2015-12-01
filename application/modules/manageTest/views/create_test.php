<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<?php echo validation_errors();?>

		<form action = 'manageTest/get_input' method = 'post' name = 'form' id = 'form'>
			<p>
				<input type = "hidden" id = "data" name = "data">
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
				<textarea class="text-input textarea wysiwyg" name="test_des" cols="79" rows="3" ><?php echo set_value('test_des'); ?></textarea>
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
							<option value="<?php echo $value['id']; ?>" <?php if(set_value('category') == $value['id']) echo 'selected';?>><?php echo $value['name']; ?></option>
							<?php
					 } ?>
				</select>
			</div>
			<p>
				<label>Tổng số lượng câu hỏi</label>
				<input class="text-input" type = text id = max_question name = max_question value="<?php echo set_value('max_question'); ?>">
				<span id="avai"></span>
			</p>
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
				<p>
					<label>Số lượng câu hỏi</label>
					<input  class="text-input" type = text id = "num_question" value="<?php echo set_value('num_question'); ?>">
					<span id="avai"></span>
				</p>
				<p>
					<label>Điểm cho phần này</label>
					<input class="text-input" type = text id = "score_question" value="<?php echo set_value('score_question'); ?>">
					<span id="avai"></span>
					<input class="button" type = button id = "btn_add" name = "btn_add" value="Add" />
				</p>
			</div>
			</p>
			<div class="clear"></div>
			<p>
				<table style = "width:100%">
					<thead>
					<tr>
						<th>Mô học</th>
						<th>Độ khó</th>
						<th>Số lượng câu hỏi</th>
						<th>Chức năng</th>
					</tr>
					</thead>

					<tbody id = "sub_selected">

					</tbody>

				</table>
			</p>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>

<script language="javascript" src="/CI/js/jquery-2.0.0.min.js"></script>
<script>
    function include(arr, id, level) {
        for (var i = 0; i < arr.length; ++i) {
            if (arr[i]['id'] == id && arr[i]['level'] == level)
                return true;
        }
        return false;

    }

    var subjectsSelected =[];
    var currentNumQuestion = 0;

    function updateView() {
        var str = "";
        var str1= "";
        var subjectName, subjectID, numQuestion, scoreQuestion;

        for (var i in subjectsSelected) {
            if (subjectsSelected.hasOwnProperty(i)) {
                subjectName = subjectsSelected[i]['name'];
                subjectID = subjectsSelected[i]['id'];
                numQuestion = subjectsSelected[i]['numQuestion'];
                scoreQuestion = subjectsSelected[i]['scoreQuestion'];
                level = subjectsSelected[i]['level'];
                levelName = subjectsSelected[i]['levelName'];
                str = str +
                    "<tr>" +
                    "<td>"+subjectName+"</td>" +
                    "<td>"+levelName+"</td>" + 
                    "<td>"+numQuestion+"</td>" +
                    "<td>"+scoreQuestion+"</td>" + 
                    "<td> <button type = 'button' onclick='removeSubject(" + subjectID + ")'>Remove</button></td>" +
                    "</tr>";

            }
        }
        document.getElementById("sub_selected").innerHTML = str;
        document.getElementById("data").value = JSON.stringify(subjectsSelected);
    }

    function addSubject() {
        var subjectName = $("#subject option:selected").text();
        var subjectID = $('#subject').val();
        var numQuestion = $('#num_question').val();
        var subjectObject ={};
        var maxQuestion = $('#max_question').val();
        var scoreQuestion = $('#score_question').val();
        var level = $('#level').val();

        var levelName = $("#level option:selected").text();


        if (currentNumQuestion + parseInt(numQuestion) > maxQuestion) {
            alert("Vượt qua tổng số lượng câu hỏi");
            return;
        }
        if (subjectID == 'non_select' || $('#level').val() == 'non_select' || $('#category').val() == 'non_select') {
            alert("Xin hãy chọn môn học, độ khó & phần học.");
            return;
        }

        if (include(subjectsSelected, subjectID, level)) {

            alert("Môn học đã tồn tại!");
            return;
        }
        if (numQuestion < 1) {
            alert("Xin hãy nhập số lượng câu hỏi");
            return;
        }
        if (scoreQuestion <= 0) {
            alert("Xin nhập điểm là một số lớn hơn 0");
            return;
        }

        subjectObject['id'] = subjectID;
        subjectObject['name'] = subjectName;
        subjectObject['numQuestion'] = numQuestion;
        subjectObject['scoreQuestion'] = scoreQuestion;
        subjectObject['level'] = level;

        subjectObject['levelName'] = levelName;

        subjectsSelected.push(subjectObject);
        currentNumQuestion += parseInt(numQuestion);
        updateView();
    }


    function removeSubject(id) {
        for (var i in subjectsSelected) {
            if (subjectsSelected.hasOwnProperty(i)) {
                if (subjectsSelected[i]['id'] == id) {

                	currentNumQuestion -= subjectsSelected[i]['numQuestion'];
                    subjectsSelected.splice(i,1);
                    updateView();
                    return;
                }
            }
        }
    }
        $(document).ready(function(){
            $('#category').on('change', function(){
                var selected = $('#category').val()
                $.ajax({
                    url: "<?php site_url();?>manageTest/get_subject",
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
                    url: "<?php site_url();?>manageTest/get_level",
                    type: 'POST',
                    data: {cat_id : selected},
                    dataType: 'html',
                    success: function(response) {
                        $('#level').html(response);
                    }
                });
            });
            
            document.getElementById("btn_add").addEventListener('click',addSubject);

        });

    </script>