<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="javascript" src="/CI/js/jquery-2.0.0.min.js"></script>

</head>
<body>
    Category
    <select id = "category" name = "category">
        <option selected value = 'non_select'>Select Category</option>
        <?php
        foreach($category as $key => $value) {
            ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php
        } ?>


    </select>
    <br>
    <input type = "text" id = "level_name" >
    <input type = "button" id = "btn_add_level" value = "Insert">
    <table>
        <thead>
            <th>Name</th>
            <th>Tools</th>
        </thead>

        <tbody id = "level">

        </tbody>
    </table>

    <script>

        function checkLevelExist(_name) {
            $.ajax({
                url: "<?php site_url();?>level/get_level",
                type: 'POST',
                data: {cat_id : data, name: _name},
                dataType: 'text',
                success: function(response) {
                    $('#level').html(response);
                }
            });
        }

        function viewLevel() {
            var data = $('#category').val();
            $.ajax({
                url: "<?php site_url();?>level/get_level",
                type: 'POST',
                data: {cat_id : data},
                dataType: 'html',
                success: function(response) {
                    $('#level').html(response);
                }
            });
        }

        function addLevel() {
            level_name = $('#level_name').val();
            if (!level_name) {
                alert("Tên level không thể rỗng!");
                return;
            }

            if ($('#category').val() === 'non_select')
                return;
            $.ajax({
                url: "<?php site_url();?>level/add_level",
                type: 'POST',
                data: {
                    level_name : $('#level_name').val(),
                    cat_id : $('#category').val()
                },
                dataType: 'text',
                success: function(response) {
                    if (response === 'false') {
                        alert("Không thể trùng độ khó trong 1 môn!");
                        document.getElementById(id_name).value = level_name;
                        return;
                    }
                    $('#level').html(response);
                    alert("Add success");
                }
            });
        }

        function removeLevel($id) {

            $.ajax({
                url: "<?php site_url();?>level/remove_level",
                type: 'POST',
                data: {
                    id: $id,
                    cat_id: $('#category').val()
                },
                dataType: 'html',
                success: function(response) {
                    $('#level').html(response);

                }
            });
        }

        function updateLevel(_id) {
            var id_name = "#text" + _id;
            level_name = $(id_name).val();
             if (!level_name) {
                alert("Tên level không thể rỗng!");
                return;
            }
            $.ajax({
                url: "<?php site_url();?>level/update_level",
                type: 'POST',
                data: {
                    id: _id,
                    cat_id: $('#category').val(),
                    name : $(id_name).val()
                },
                dataType: 'text',
                success: function(response) {
                    if (response === 'false') {
                        alert("Không thể trùng độ khó trong 1 môn!");
                        document.getElementById(id_name).value = level_name;
                        return;
                    }
                    $('#level').html(response);
                    alert("Update success");
                }
            });
        }

        $(document).ready(function(){

            $('#category').on('change', viewLevel);
            $('#btn_add_level').on('click', addLevel);

        });


    </script>
</body>
</html>
