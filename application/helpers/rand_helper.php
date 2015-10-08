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
/*if(!function_exists('random_quistionbank')){
	function random_quistionbank(){
		$a_answer = array(
						'answerA' => mt_rand_str(30),
						'answerB' => mt_rand_str(30),
						'answerC' => mt_rand_str(30),
						'answerD' => mt_rand_str(30)
						);
		$answer = json_encode($a_answer);
		$quiz_info = array(
							'subjectid' => rand(1,8),
							'question'=> mt_rand_str(50),
							'answer' => $answer,
							'level' => rand(1,40),
							'score' => rand(1,3),
							'correct' => rand(1,4),
							'ans_explained' => mt_rand_str(50)
		);
		return $quiz_info;
	}
}
if(!function_exists('random_user')){
	function random_user(){
		$json_string = array(
						'birthday' => mt_rand_date(),
						'gender' => rand(0,1),
						'address' => mt_rand_str(50)
						);
		$extra_info = json_encode($json_string);
		$quiz_info = array(
							'name' => mt_rand_username(10),
							'email' => mt_rand_mail(rand(7,10)),
							'password' => md5(mt_rand_str(rand(7,15))),
							'level' => rand(1,3),
							'active' =>1,
							'extra_info' => $extra_info
		);
		return $quiz_info;
	}
}
if(!function_exists('random_quiz_of_test')){
	function random_quiz_of_test($test_id){
		$test_info = array(
							'testid' => $test_id,
							'questionid' => rand(1,9000)
		);
		return $test_info;
	}
}

*/





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
							'time' => rand(30,40),
							'levelid' => $level_id,
							'decription' => mt_rand_str(50)
		);
		return $test_info;

	}
}

if(!function_exists('random_questionbank')){
	function random_questionbank($sub_id, $level_id){
		$a_answer = array(
						'answerA' => 'ANSWER_'.mt_rand_str(30),
						'answerB' => 'ANSWER_'.mt_rand_str(30),
						'answerC' => 'ANSWER_'.mt_rand_str(30),
						'answerD' => 'ANSWER_'.mt_rand_str(30)
						);
		$answer = json_encode($a_answer);
		$quiz_info = array(
							'subjectid' => $sub_id,
							'question'=> 'QUESTION_'.mt_rand_str(50),
							'answer' => $answer,
							'level' => $level_id,
							'score' => rand(1,3),
							'correct' => rand(1,4),
							'ans_explained' => 'ANSWER_EXPLAINED_'.mt_rand_str(50)
		);
		return $quiz_info;
	}
}


if(!function_exists('random_question')){
	function random_question($test_id,$question_id){
		$question_info = array(
							'testid' => $test_id,
							'questionid' => $question_id
		);
		return $question_info;
	}
}
