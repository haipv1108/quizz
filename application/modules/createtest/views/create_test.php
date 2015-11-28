<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="javascript" src="/CI/js/jquery-2.0.0.min.js"></script>

</head>
<body>
<form action = 'createtest/get_input' method = 'post' name = 'form' id = 'form'>
    Ten de thi
    <input type=text name="test_name"><br>
    Thoi gian
    <input type = text name = "test_time"><br>
    Mo ta
    <input type = text name = "test_des" ><br>
    Ma de thi
    <input type = text name = "madethi"><br>
    Cach cham
    <select name = "cachcham">
        <option value="1">Cham theo.....1</option>
        <option value="2">Cham theo.....2</option>
        <option value="3">Cham theo.....3</option>

    </select>
    </br>
    Mon hoc
    <select id = "category" name = "category">
        <option selected value = 'non_select'>Select Category</option>
        <?php
        foreach($categories as $key => $value) {
            ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                <?php
         } ?>
    </select><br>

   <input type = "hidden" id = "data" name = "data">

    Do kho<br>
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

    Tong so luong cau hoi
    <input type = text id = max_question name = max_question>
    </br>
    Phan hoc
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

    So luong cau hoi<input type = text id = "num_question" >
    Diem cho phan nay<input type = text id = "score_question">
    <input type = button id = "btn_add" name = "btn_add" value="Add">
    <br>


    <table style = "width:100%">
        <thead>
        <tr>
            <th>Subjects Selected</th>
            <th>Number Of Question</th>
            <th>Tool</th>
        </tr>
        </thead>

        <tbody id = "sub_selected">

        </tbody>

    </table>

    <input type="submit" value = "Submit">
</form>

<script>
    function include(arr, id) {
        for (var i = 0; i < arr.length; ++i) {
            if (arr[i]['id'] == id)
                return true;
        }
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
                str = str +
                    "<tr>" +
                    "<td>"+subjectName+"</td>" +
                    "<td><input type = text id = text" + subjectID + " value=" +numQuestion +"></td>" +
                    "<td>"+scoreQuestion+"</td>" + 
                    "<td>"+level+"</td>" + 
                    "<td> <button type = 'button' onclick='updateSubject(" + subjectID + ")'>Update</button></td>" +
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

        if (currentNumQuestion + parseInt(numQuestion) > maxQuestion) {
            alert("Qua nhieu cau hoi trong phan hoc nay");
            return;
        }
        if (subjectID == 'non_select' || $('#level').val() == 'non_select' || $('#category').val() == 'non_select') {
            alert("Xin hay chon mon hoc, do kho va phan hoc");
            return;
        }
        if (include(subjectsSelected, subjectID)) {
            alert("Mon hoc da ton tai!");
            return;
        }
        if (numQuestion < 1) {
            alert("Xin hay nhap so luong cau hoi");
            return;
        }
        if (scoreQuestion <= 0) {
            alert("Xin nhap diem la 1 so lon hon 0");
            return;
        }

        subjectObject['id'] = subjectID;
        subjectObject['name'] = subjectName;
        subjectObject['numQuestion'] = numQuestion;
        subjectObject['scoreQuestion'] = scoreQuestion;
        subjectObject['level'] = level;
        subjectsSelected.push(subjectObject);
        currentNumQuestion += parseInt(numQuestion);
        updateView();
    }


    function updateSubject(id) {
        var numQuestionNode = "text" + id;
        var numQuestion = $(numQuestionNode).val();

        for (var i in subjectsSelected) {
            if (subjectsSelected.hasOwnProperty(i)) {
                if (subjectsSelected[i]['id'] == id) {
                    subjectsSelected[i]['numQuestion'] = numQuestion;
                    alert("Update Success");
                    return;
                }
            }
        }
    }

    function removeSubject(id) {
        for (var i in subjectsSelected) {
            if (subjectsSelected.hasOwnProperty(i)) {
                if (subjectsSelected[i]['id'] == id) {
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
                    url: "<?php site_url();?>createtest/get_subject",
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
                    url: "<?php site_url();?>createtest/get_level",
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
</body>
</html>
