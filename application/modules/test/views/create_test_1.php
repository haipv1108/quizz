
    <?php echo form_open('test/create_test')?>
    Ten de thi <input type = text name = "test_name" value="<?php echo isset($test_name)?$test_name:"";?>"> <br>
    Thoi gian <input type = text name = "test_time" value = "<?php echo isset($test_name)?$test_time:"";?>"> <br>
    Mo ta <input type = text name = "test_des" value="<?php echo isset($test_name)?$test_des:"";?>"> <br>
    So de thi <input type = text name = "test_nums" value = "<?php echo isset($test_name)?$test_nums:"";?>"> <br>
    Mon hoc <select  name = "category">
        <?php
        foreach($categories as $key => $value) {
            $name = $value['name'];
            $id = $value['id'];
            print "<option value=\"$id\">$name</option>\n";
        }
        ?>
    </select>
    <?php echo form_close()?>
    Phan hoc <select name = "subject">
        <?php
            foreach($subjects as $key => $value) {
                $id = $value['id'];
                $name = $value['name'];
                $categoryid = $value['categoryid'];
                if ($categoryid ==  $category)
                print "<option value=\"$id\">$name</option>\n";
            }
        ?>
    </select>
    <input type = submit value="Submit">






