	<form method = post action="test.php">
    <input type='checkbox' name='checkboxvar[]' value='Option One'>1<br>
    <input type='checkbox' name='checkboxvar[]' value='Option Two'>2<br>
    <input type='checkbox' name='checkboxvar[]' value='Option Three'>3
    <input type = submit value="Submit">
    </form>
    <?php
    $checkboxvar = $_POST['checkboxvar'];

    echo "<pre>";
    print_r($checkboxvar);
    foreach ($checkboxvar as $key => $value) {
    	if (isset($value)) 
    		echo $value;
    }

    ?>