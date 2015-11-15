<?php
$subs_selected = null;

function add_subject() {
    global $subs_selected;

    if (isset($_POST['sub_selected']) && isset($_POST['num_question'])) {
        $sub_selected = $_POST['sub_selected'];
        $num_question = $_POST['num_question'];
        if ($subs_selected != null) {
            array_push($subs_selected, array('subject' => $sub_selected,'num_question'=> $num_question));
        }
        else
            $subs_selected = array(array('subject' => $sub_selected,'num_question'=> $num_question));
        $this->update_subject_table($subs_selected);
    }
}

function update_subject_table($subs_selected) {
    if (isset($subs_selected)) {
        foreach($subs_selected as $key => $value) {
            $subject = $value['subject'];
            $num_question = $value['num_question'];
            print "<tr>
						   <td>$subject</td>
						   <td><input type = text name = \"num_question\" id = \"num_question\"$key value = $num_question></td>
						   <td>
								<input type='button' id='btn_edit'$key value='Update'>
								<input type='button' id ='btn_del'$key value='Edit'>
						   </td>
                       </tr>
                       ";
        }
    }
}