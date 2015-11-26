<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('mt_rand_str')){
	function mt_rand_str($l, $c='abcdefghijklmnopqrstuvwxyz12345678990             '){
		for($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0,$cl)], ++$i);
		return $s;
	}
}if(!function_exists('mt_rand_username')){
	function mt_rand_username($l, $c='abcdefghijklmnopqrstuvwxyz12345678990 '){
		for($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0,$cl)], ++$i);
		return $s;
	}
}
if(!function_exists('mt_rand_date')){
	function mt_rand_date(){
		$int= mt_rand(0000000000,1262055681);
		$date = date("Y-m-d",$int);
		return $date;
	}
}
if(!function_exists('mt_rand_mail')){
	function mt_rand_mail($l, $c='abcdefghijklmnopqrstuvwxyz12345678990____________'){
		for($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0,$cl)], ++$i);
		return $s.'@gmail.com';
	}
}


if(!function_exists('random_category')){
	function random_category(){
		$cate_info = array(
							'name' => 'CATE_'.mt_rand_str(4,"ABCDEF"),
							'decription' => mt_rand_str(50)
		);
		return $cate_info;
	}
}

if(!function_exists('random_level_category')){
	function random_level_category($cate_id){
		$level_info = array(
							'categoryid' => $cate_id,
							'name' => 'LEVEL_'.mt_rand_str(4,"NA12345"),
		);
		return $level_info;
	}
}


if(!function_exists('random_subject')){
	function random_subject($cate_id){
		$subject_info = array(
							'categoryid' => $cate_id,
							'name' => 'SUBJECT_'.mt_rand_str(4,"GHIKLM"),
							'decription' => 'SUBJECT'.mt_rand_str(50)
		);
		return $subject_info;
	}

}

if(!function_exists('random_test')){
	function random_test($sub_id, $level_id){
		$test_info = array(
							'subjectid' => $sub_id,
							'name' => 'TEST_'.mt_rand_str(4,"ABCDEF"),
							'madethi'=>'MADE_'.$sub_id.mt_rand_str(3,'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm'),
							'time' => rand(30,40),
							'levelid' => $level_id,
							'sl' => rand(10, 12),
							'decription' => mt_rand_str(50)
		);
		return $test_info;

	}
}

if(!function_exists('random_questionbank')){
	function random_questionbank($sub_id, $cate_id, $level_id){
		$number_answer = rand(3, 7);
		$a_answer = array();
		for($i = 1; $i<= $number_answer; $i++ ){
			$a_answer[$i] = 'ANSWER_'.mt_rand_str(30);
		}
		$answer = json_encode($a_answer);
		$correct;
		if($number_answer > 4){
			$correct = array(
							'1'=>rand(1,3),
							'2'=>rand(4,$number_answer)
							);
		}else{
			$correct = array(
							'1' => rand(1, $number_answer)
							);
		}
		$dapan = json_encode($correct);
		$quiz_info = array(
							'categoryid'=>$cate_id,
							'question'=> 'QUESTION_'.mt_rand_str(50),
							'answer' => $answer,
							'level' => $level_id,
							'correct' => $dapan,
							'type' => rand(1,3),
							'ans_explained' => 'ANSWER_EXPLAINED_'.mt_rand_str(50),
							'subjectid' => $sub_id
		);
		return $quiz_info;
	}
}


if(!function_exists('random_question')){
	function random_question($test_id,$question_id){
		$question_info = array(
							'testid' => $test_id,
							'questionid' => $question_id,
							'score' => rand(1, 3)
		);
		return $question_info;
	}
}
