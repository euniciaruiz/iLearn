<?php

class Question extends CI_Model {
	function getSubjectQuestionList($subject_id) {
		$query = "select * from question where subject_id = '$subject_id'";
		$result = pg_query($query);
		$data = array();
		$counter = 0;
		while ($row = pg_fetch_array($result)) {
			$data[$counter] = $row;
			$counter++;
		}
		return $data;
	}
	
	function getCorrectAnswer($question_id){
		$query = "select answer from question where id='$question_id'";
		$answer = pg_query($query);
		return $answer;
	}
}