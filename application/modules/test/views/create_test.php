
    <?php echo form_open('test/create_test')?>
    Ten de thi <input type = text name = "test_name" value="<?php echo isset($test_name)?$test_name:"";?>"> <br>
    Thoi gian <input type = text name = "test_time" value = "<?php echo isset($test_name)?$test_time:"";?>"> <br>
    Mo ta <input type = text name = "test_des" value="<?php echo isset($test_name)?$test_des:"";?>"> <br>
    So de thi <input type = text name = "test_nums" value = "<?php echo isset($test_name)?$test_nums:"";?>"> <br>
    Mon hoc <select id = "category" name = "category">
        <?php
        $test = 0;
        foreach($categories as $key => $value) {
            if ($test == 0) { ?>
                <option selected value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php
               ++$test;
            } else { ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                <?php
            }
         } ?>
    </select>
    <?php echo form_close()?>
    Phan hoc <select id = "subject" name = "subject">
        <?php
        foreach($subjects as $key => $value) { ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
        <?php
        }

        ?>
    </select>
    <input type = submit value="Submit">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#category').on('change', function(){
                var selected = $('#category').val()
                $.ajax({
                    url: "<?php site_url();?>test/get_subject",
                    type: 'POST',
                    data: {id : selected},
                    dataType: 'html',
                    success: function(response) {
                        $('#subject').html(response);
                    }
                });
            });
        });
    </script>



